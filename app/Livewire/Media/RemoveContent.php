<?php

namespace App\Livewire\Media;

use App\Models\Content;
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
        $content->delete();

        $this->dispatch('content_removed_' . $this->content);
    }

    public function render()
    {
        return view('livewire.media.remove-content');
    }
}
