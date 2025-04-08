@extends("app")
@section("title", "Patients")
@section("subtitle")
    <livewire:sort-menu route="patients.index" :options="$options" />
@endsection
@section("content")

    <div class="grid grid-cols-1 gap-2">
        @forelse($patients as $patient)
            <div class="relative flex items-center space-x-3 rounded-lg border border-stone-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-lime-500 focus-within:ring-offset-2 hover:border-lime-400 hover:bg-lime-100">
                <div class="shrink-0">
                    <img
                            class="size-10 rounded-full"
                            src="{{ $patient->avatar }}"
                            alt="{{ $patient->full_name }}"
                    >
                </div>
                <div class="min-w-0 flex-1">
                    <a
                            href="#"
                            class="focus:outline-none"
                    >
                        <p class="font-bold text-stone-900">{{ $patient->full_name }} (#{{ $patient->id }}) </p>
                        <p class="truncate text-sm text-stone-500">
                            <span class="text-sm text-stone-900">DOB:</span> {{ $patient->dob }}
                        </p>
                    </a>
                </div>
                <div class="shrink-0">
                    <button
                            type="button"
                            class="btn-primary"
                    >
                        Message
                    </button>
                </div>
            </div>
        @empty
            <div>there are no patients!</div>
        @endforelse
    </div>
@endsection
