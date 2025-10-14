<div>
    <form wire:submit="storeVideos">
        <div class="w-full mb-6" x-data="{
            dropping: false,
            uploading: false,
            progress: 0,
            handleUpload(event) {
                $wire.uploadMultiple('videos', event.dataTransfer.files,
                    (uploadedFilename) => {
                        this.uploading = false;
                    },
                    () => {},
                    (event) => {
        
                        this.progress = event.detail.progress
        
                    },
                )
            }
        }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <label for="videos" x-on:dragleave.prevent="dropping = false" x-on:dragover.prevent="dropping = true"
                x-on:drop="dropping = false; uploading = true;" x-on:drop.prevent="handleUpload($event)"
                x-bind:class="{
                    'border-gray-300': !dropping,
                    'border-gray-600': dropping
                }"
                class="flex items-center justify-center rounded
                    dark:text-white font-bold border-4 border-dashed
                     bg-zinc-800  p-10">Clique
                ou arraste seus vídeos para realizar o upload...</label>

            <input type="file" id="videos" wire:model="videos" class="sr-only" multiple>

            <!-- Progress Bar -->
            <div x-show="uploading" class="w-full">
                <progress max="100" x-bind:value="progress" class="w-full rounded-xl"></progress>
            </div>
            <!-- Progress Bar -->

            @error('form.cover')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button
            class="px-4 py-2 rounded bg-green-700 border-green-900
                    text-white font-bold hover:bg-green-900 transition ease-in-out duration-300">
            Realizar Upload
        </button>
    </form>
</div>
