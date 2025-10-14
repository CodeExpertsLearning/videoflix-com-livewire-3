<?php

namespace App\Livewire\Media;

use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class RemoveContent extends Component
{
    public $content;

    public function mount(int $content)
    {
        $this->content = $content;
    }

    public function remove()
    {
        $content = Content::findOrFail($this->content);

        $disk = Storage::disk('public');
        if($disk->exists($content->cover)) $disk->delete($content->cover);

        $content->delete();

        session()->flash('success', 'Conteúdo removido com sucesso!');
        return redirect()->route('media.contents.index');
    }

    public function render()
    {
        return view('livewire.media.remove-content');
    }
}
