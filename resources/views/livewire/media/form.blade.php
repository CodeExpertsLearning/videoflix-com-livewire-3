<div>
    <x-message />

    <form wire:submit="save">
        <div class="w-full mb-6">
            <label for="title" class="block mb-2">Titulo</label>
            <input type="text" id="title" wire:model="form.title"
                class="w-full rounded border
                    border-gray-400 p-3">

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
                    border-gray-400 p-3">

            @error('form.description')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="body" class="block mb-2">Conteúdo</label>
            <textarea id="body" wire:model="form.body" class="w-full rounded border
                    border-gray-400 p-3"></textarea>

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
                    border-gray-400 p-3">

            @error('form.slug')
                <div class="p-4 rounded border border-red-900 bg-red-300 text-red-900 my-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="w-full mb-6">
            <label for="type" class="block mb-2">Tipo</label>

            <select wire:model="form.type" id="type" class="w-full rounded border border-gray-400 p-3">
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

            <select wire:model="form.status" id="status" class="w-full rounded border border-gray-400 p-3">
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
