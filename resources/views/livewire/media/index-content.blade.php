<div>
    <h2 class="font-bold text-2xl mb-10">Conteúdos</h2>

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

                        <livewire:media.remove-content :content="$content->id" :key="$content->id"
                            @content_removed_{{ $content->id }}="$refresh" />
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
