<?php

namespace App\Livewire\Media;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class IndexContent extends Component
{
    use WithPagination;

    public function render()
    {
        $contents = Content::orderBy('id', 'DESC')->paginate(15);

        return view('livewire.media.index-content', compact('contents'));
    }
}
