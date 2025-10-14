<div>
    <div class="w-full mb-10 flex justify-between items-center">
        <h2 class="font-bold text-2xl mb-10">Conteúdos</h2>

        <a href="{{ route('media.contents.create') }}"
            class="
            px-4 py-2 rounded bg-green-700 border-green-900
            text-white font-bold hover:bg-green-900 transition ease-in-out duration-300
        ">
            CRIAR CONTEÚDO
        </a>
    </div>

    <table class="w-full">
        <thead>
            <tr>
                <th class="text-xl font-bold text-left px-6 py-4">#</th>
                <th class="text-xl font-bold text-left px-6 py-4">Conteúdo</th>
                <th class="text-xl font-bold text-left px-6 py-4">Status</th>
                <th class="text-xl font-bold text-left px-6 py-4">Criado em</th>
                <th class="text-xl font-bold text-left px-6 py-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contents as $content)
                <tr class="pb-1 border-b border-gray-400">
                    <td class="text-xl text-left px-6 py-4">{{ $content->id }}</td>
                    <td class="text-xl text-left px-6 py-4">{{ $content->title }}</td>
                    <td class="text-xl text-left px-6 py-4">{{ $content->status }}</td>
                    <td class="text-xl text-left px-6 py-4">{{ $content->created_at->format('d/m/Y h:i') }}</td>
                    <td class="text-xl text-left px-6 py-4 flex gap-4">

                        <a href="{{ route('media.contents.edit', $content->id) }}"
                            class="
                            px-4 py-2 rounded bg-blue-700 border-blue-900
                          text-white font-bold hover:bg-blue-900 transition ease-in-out duration-300
                        ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>

                        <livewire:media.remove-content :content="$content->id" :key="$content->id" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Sem conteúdos!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
