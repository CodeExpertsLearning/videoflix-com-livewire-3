<div>
    <x-message />
    @if (request()->routeIs('media.contents.edit'))
        <div class="w-full mb-10 flex justify-end items-center">
            <a wire:navigate href="{{ route('media.contents.videos.upload', $content) }}"
                class="
            px-4 py-2 rounded bg-green-700 border-green-900
            text-white font-bold hover:bg-green-900 transition ease-in-out duration-300
        ">
                UPLOAD VÍDEOS
            </a>
        </div>
    @endif
    <form wire:submit="save">
        <div class="w-full mb-6">
            <label for="title" class="block mb-2">Titulo</label>
            <input type="text" id="title" wire:model="form.title"
                class="w-full rounded border
                    border-gray-400 p-3 bg-white text-black">

            @error('form.title')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="description" class="block mb-2">Descrição</label>
            <input type="text" id="description" wire:model="form.description"
                class="w-full rounded border
                    border-gray-400 p-3 bg-white text-black ">

            @error('form.description')
                <div class="p-4 rounded border  border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="body" class="block mb-2">Conteúdo</label>
            <textarea id="body" wire:model="form.body"
                class="w-full rounded border
                    border-gray-400 p-3 bg-white text-black "></textarea>

            @error('form.body')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="slug" class="block mb-2">Slug</label>
            <input type="text" id="slug" wire:model="form.slug"
                class="w-full rounded border
                    border-gray-400 p-3 bg-white text-black ">

            @error('form.slug')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="type" class="block mb-2">Tipo</label>

            <select wire:model="form.type" id="type"
                class="w-full text-black bg-white rounded border border-gray-400 p-3">
                <option value="MOVIE">FILME</option>
                <option value="SERIE">SÉRIE</option>
            </select>

            @error('form.type')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="status" class="block mb-2">Status</label>

            <select wire:model="form.status" id="status"
                class="w-full rounded text-black bg-white border border-gray-400 p-3">
                <option value="ACTIVE">ATIVO</option>
                <option value="DRAFT">RASCUNHO</option>
                <option value="INACTIVE">INATIVO</option>
            </select>

            @error('form.status')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="w-full mb-6" x-data="{
            dropping: false,
            handleCover(event) {
                $wire.upload('form.cover', event.dataTransfer.files[0])
            }
        }">
            <label for="cover" x-on:dragleave.prevent="dropping = false" x-on:dragover.prevent="dropping = true"
                x-on:drop="dropping = false" x-on:drop.prevent="handleCover($event)"
                x-bind:class="{
                    'border-gray-300': !dropping,
                    'border-gray-600': dropping
                }"
                class="flex items-center justify-center rounded
                    dark:text-white font-bold border-4 border-dashed
                     bg-zinc-800  p-10">Clique
                ou arraste sua imagem para capa do Conteúdo...</label>

            <input type="file" id="cover" wire:model="form.cover" class="sr-only">

            @error('form.cover')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror

            @if (!$form->cover && $form->coverReal)
                <img src="{{ asset('storage/' . $form->coverReal) }}" alt="">
            @endif

            @if ($form->cover)
                <img src="{{ $form->cover->temporaryUrl() }}" alt="">
            @endif
        </div>

        <button
            class="px-4 py-2 rounded bg-green-700 border-green-900
                    text-white font-bold hover:bg-green-900 transition ease-in-out duration-300">
            {{ $labelButton }}
        </button>

        <div wire:loading>
            Processando...
        </div>
    </form>
</div>
