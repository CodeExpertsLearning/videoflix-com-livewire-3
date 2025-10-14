<?php

namespace App\Livewire\Forms;

use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class ContentForm extends Form
{
    #[Rule('required|min:10')]
    public string $title;

    #[Rule('nullable|min:30')]
    public string $description;

    #[Rule('required')]
    public string  $body;

    #[Rule('required')]
    public string  $slug;

    #[Rule('nullable|image')]
    public $cover;

    #[Rule('required')]
    public string  $status = 'DRAFT';

    #[Rule('required')]
    public string  $type = 'MOVIE';

    public ?string $coverReal;

    public function setContent(Content $content)
    {
        $this->title = $content->title;
        $this->description = $content->description;
        $this->body = $content->body;
        $this->type = $content->type;
        $this->status = $content->status;
        $this->slug = $content->slug;
        $this->coverReal = $content->cover;
    }

    public function save(): bool
    {
        $this->validate();

        $data = $this->all();
        $data['code'] = str()->uuid();
        $data['cover'] = $data['cover']?->store('contents', 'public');

        Content::create($data);

        return true;
    }

    public function update(int $content): bool
    {
        $this->validate();

        $data = $this->all();
        $content = Content::find($content);

        if($data['cover']) {
            $disk = Storage::disk('public');

            if($content->cover && $disk->exists($content->cover))
                $disk->delete($content->cover);

            $data['cover'] = $data['cover']->store('contents', 'public');
        }

        return $content->update($data);
    }
}
