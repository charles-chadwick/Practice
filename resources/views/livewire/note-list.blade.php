<div class="grid grid-cols-1 gap-4">
    @forelse($notes as $note)
        <div
            wire:key="{{ $note->id }}"
            class="relative flex items-center space-x-3 rounded-lg border border-stone-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-lime-500 focus-within:ring-offset-2 hover:border-stone-400"
        >
            <div class="shrink-0">
                <img
                    class="size-10 rounded-full"
                    src="{{ $note->user->avatar }}"
                    alt="{{ $note->user->full_name }}"
                >
            </div>
            <div class="min-w-0 flex-1">
                <flux:modal.trigger :name="'edit-note'.$note->id">
                <a
                    href="#"
                    class="focus:outline-none"
                >
                    <span
                        class="absolute inset-0"
                        aria-hidden="true"
                    ></span>
                    <p class="text-sm font-bold text-stone-900">{{ $note->title }}</p>
                    <p class="truncate text-sm">{{ $note->content }}</p>
                    <p class="text-xs text-stone-500">{{ $note->user->full_name }} on {{ $note->created_at }}</p>
                </a>
                </flux:modal.trigger>
                <flux:modal :name="'edit-note'.$note->id">
                    <livewire:note-form :note="$note" />
                </flux:modal>
            </div>
        </div>
    @empty
        <div class="empty">There are no notes.</div>
    @endforelse
</div>
