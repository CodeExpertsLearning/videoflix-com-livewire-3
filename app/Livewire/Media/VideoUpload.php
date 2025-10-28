<?php

namespace App\Livewire\Media;

use App\Jobs\VideoEncodingJob;
use App\Models\Content;
use Livewire\{WithFileUploads, Component};

class VideoUpload extends Component
{
    use WithFileUploads;

    public $videos;

    public Content $content;

    public function storeVideos()
    {
        $this->validate();

        foreach($this->videos as $video) {

           $video = $this->content->videos()->create([
                'name' => $video->getClientOriginalName(),
                'video' => $video->store('', 'videos'),
                'code'  => str()->uuid()
            ]);

            dispatch(new VideoEncodingJob($video));
        }
    }

    protected function rules()
    {
        return [
            'videos.*' => 'file|mimetypes:video/mp4,video/mpeg,video/x-matroska,application/octet-stream'
        ];
    }

    public function render()
    {
        return view('livewire.media.video-upload');
    }
}
