<div>
    @if($notes->count() > 0)
        <ul
            role="list"
            class="divide-y divide-stone-100 overflow-hidden bg-white ring-1 ring-stone-900/5"
        >
            @foreach($notes as $note)
                <li class="relative flex justify-between gap-x-6 px-4 py-5 list-hover sm:px-6">
                    <div class="flex min-w-0 gap-x-4">

                        <div class="min-w-0 flex-auto">
                            <p class="text-stone-900">
                                <flux:modal.trigger :name="'edit-note-'.$note->id">
                                    <a
                                        href="#"
                                        class="font-bold"
                                    >
                                        {{ $note->title }}
                                    </a>
                                </flux:modal.trigger>
                            </p>

                            <p class="mt-1 flex text-xs/5 text-stone-500 truncate">
                                {{ $note->content }}
                            </p>
                        </div>
                    </div>

                    <div class="flex shrink-0 items-center gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-stone-900">{{ $note->user->full_name }}</p>
                            <p class="mt-1 text-xs/5 text-stone-500">{{ $note->created_at }}</p>
                        </div>
                    </div>
                </li>
                <flux:modal :name="'edit-note-'.$note->id" class="min-w-xl">
                    <livewire:note-form
                        :obj="$obj_on"
                        :note="$note"
                    />
                </flux:modal>
            @endforeach
        </ul>
    @else
        <p>There are no notes.</p>
    @endif
</div>
