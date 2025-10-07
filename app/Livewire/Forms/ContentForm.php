<?php

namespace App\Livewire\Forms;

use App\Models\Content;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class ContentForm extends Form
{
    #[Rule('required|min:30')]
    public string $title;

    #[Rule('nullable|min:30')]
    public string $description;

    #[Rule('required')]
    public string  $body;

    #[Rule('required')]
    public string  $slug;

    public string  $cover;

    #[Rule('required')]
    public string  $status = 'DRAFT';

    #[Rule('required')]
    public string  $type = 'MOVIE';

    public function setContent(Content $content)
    {
        $this->title = $content->title;
        $this->description = $content->description;
        $this->body = $content->body;
        $this->type = $content->type;
        $this->status = $content->status;
        $this->slug = $content->slug;
    }

    public function save(): bool
    {
        $this->validate();

        $data = $this->all();
        $data['code'] = str()->uuid();

        Content::create($data);

        return true;
    }

    public function update(int $content): bool
    {
        $this->validate();

        $data = $this->all();

        $content = Content::find($content);

        return $content->update($data);
    }
}
