<div>
    @if($appointments->count() > 0)
        <ul
            role="list"
            class="divide-y divide-stone-100 overflow-hidden bg-white ring-1 ring-stone-900/5"
        >
            @foreach($appointments as $appointment)
                <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-stone-50 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">

                        <div class="min-w-0 flex-auto">
                            <p class="text-stone-900">
                                <flux:modal.trigger :name="'edit-appointment-'.$appointment->id">
                                    <a
                                        href="#"
                                        class="font-bold"
                                    >
                                        {{ $appointment->type }} - {{ $appointment->reason }}
                                    </a>
                                </flux:modal.trigger>
                            </p>
                            <p class="text-sm">
                                {{ $appointment->status }} : {{ $appointment->timeRange }}
                            </p>
                            <p class="mt-1 flex text-xs/5 text-stone-500">
                                {{ $appointment->notes }}
                            </p>
                        </div>
                    </div>

                    <div class="flex shrink-0 items-center gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-stone-900">{{ $appointment->doctor->full_name }}</p>
                            <p class="mt-1 text-xs/5 text-stone-500">{{ $appointment->doctor->role }}</p>
                        </div>
                        <svg
                            class="size-5 flex-none text-stone-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>

                </li>
                <flux:modal :name="'edit-appointment-'.$appointment->id">
                    <livewire:appointment-form
                        :appointment="$appointment"
                        :patient="$patient"
                    />
                </flux:modal>
            @endforeach
        </ul>
    @else
        <p>There are no appointments.</p>
    @endif
</div>
