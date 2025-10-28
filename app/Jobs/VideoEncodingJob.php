<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoEncodingJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private Video $video)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $newVideoName = str_replace(strrchr($this->video->video, '.'), '', $this->video->video) . '.m3u8';

        $low  = (new X264())->setKiloBitrate(500);
        $mid  = (new X264())->setKiloBitrate(1500);
        $high = (new X264())->setKiloBitrate(3000);

        FFMpeg::fromDisk('videos')
            ->open($this->video->video)
            ->exportForHLS()
            ->addFormat($low)
            ->addFormat($mid)
            ->addFormat($high)
            ->onProgress(function($progress) use($newVideoName){
                //Disparar o evento com o progresso do encoding do video
            })
            ->toDisk('videos_encoded')
            ->save($this->video->code . '/' . $newVideoName);

            Storage::disk('videos')->delete($this->video->video);

            $this->video->update([
                'video' => $newVideoName,
                'is_processed' => true
            ]);
    }
}
