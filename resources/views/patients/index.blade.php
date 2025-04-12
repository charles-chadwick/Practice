@extends("app")
@section("title", "Patients")
@section("subtitle")

@endsection
@section("content")
    <div class="flex my-2">
        <livewire:sort-menu
            route="patients.index"
            :options="$options"
        />
    </div>
    <x-section>

        <div>
            @if($patients->count() > 0)
                <ul
                    role="list"
                    class="text-stone-500 overflow-hidden bg-white"
                >
                    @foreach($patients as $patient)
                        <li class="relative flex justify-between gap-x-6 px-4 py-5 border border-stone-100 sm:px-6 list-hover">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="shrink-0">
                                    <img
                                        class="size-10 rounded-full"
                                        src="{{ $patient->avatar }}"
                                        alt="{{ $patient->full_name }}"
                                    >
                                </div>
                                <div class="min-w-0 flex-auto">

                                    <a class="font-bold text-stone-900" href="{{ route("patients.profile", $patient->id) }}">{{ $patient->full_name }} (#{{ $patient->id }})</a>
                                    <p class="mt-1 flex text-xs truncate">
                                        <span class="font-semibold">DOB</span> : {{ $patient->dob }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex shrink-0 items-center gap-x-4">
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    <p class="mt-1 text-xs/5 ">Created: {{ $patient->created_at }}</p>
                                </div>
                            </div>
                        </li>
                        <flux:modal
                            :name="'edit-patient-'.$patient->id"
                            class="min-w-xl"
                        >
                            <livewire:patient-form
                                :patient="$patient"
                            />
                        </flux:modal>
                    @endforeach
                </ul>
            @else
                <p>There are no patients.</p>
            @endif
        </div>
        {{ $patients->links() }}
    </x-section>
@endsection
