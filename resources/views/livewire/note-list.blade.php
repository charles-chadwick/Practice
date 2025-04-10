<div class="grid grid-cols-1 gap-4">
    @forelse($notes as $note)
        <div class="flex items-center space-x-3 rounded-lg border border-stone-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-lime-500 focus-within:ring-offset-2 hover:border-stone-400">
            <div class="shrink-0">
                <img
                    class="size-10 rounded-full"
                    src="{{ $note->user->avatar }}"
                    alt=""
                >
            </div>
            <div class="min-w-0 flex-1">
                <a
                    href="#"
                    class="focus:outline-none"
                >
                        <span
                            class="absolute inset-0"
                            aria-hidden="true"
                        ></span>
                    <p class="text-sm font-medium text-stone-900">{{ $note->title }}</p>
                    <p class="text-sm text-stone-700">{{ $note->created_at }}</p>
                    <p class="truncate text-sm text-stone-500">{{ $note->content }}</p>
                </a>
            </div>
        </div>
    @empty
        <p>There are no notes</p>
    @endforelse
</div>
