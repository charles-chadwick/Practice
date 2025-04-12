<div>
    @if($appointments->count() > 0)
        <ul
            role="list"
            class="divide-y divide-stone-100 overflow-hidden bg-white ring-1 ring-stone-900/5"
        >
            @foreach($appointments as $appointment)
                <li class="relative flex justify-between gap-x-6 px-4 py-5 list-hover">
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
                                {{ Str::limit($appointment->notes, 120) }}
                            </p>
                        </div>
                    </div>

                    <div class="flex shrink-0 items-center gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-stone-900">{{ $appointment->doctor->full_name }}</p>
                            <p class="mt-1 text-xs/5 text-stone-500">{{ $appointment->doctor->role }}</p>
                        </div>
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
        <p class="text-sm">There are no appointments.</p>
    @endif


</div>
