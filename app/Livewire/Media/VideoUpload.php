<?php

namespace App\Livewire\Media;

use Livewire\{WithFileUploads, Component};

class VideoUpload extends Component
{
    use WithFileUploads;

    public $videos;

    public function storeVideos()
    {
        dd($this->videos);
    }

    public function render()
    {
        return view('livewire.media.video-upload');
    }
}
