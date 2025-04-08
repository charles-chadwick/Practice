@extends("app")
@section("title", "Patients")
@section("content")
    <div class="bg-white shadow-sm p-4">

        @foreach($patients as $patient)
            <div class="grid grid-cols-1 gap-4 my-2">
                <div class="relative flex items-center space-x-3 border border-stone-200 rounded hover:rounded-lg bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-lime-500 focus-within:ring-offset-2  hover:ring-lime-500  hover:border-lime-500 hover:bg-lime-100">

                    <div class="shrink-0">
                        <img
                            class="size-10 rounded-full"
                            src="{{ $patient->avatar }}"
                            alt=""
                        >
                    </div>

                    <div class="min-w-0 flex-1">
                        <a
                            href="{{ route('patients.profile', $patient->id) }}"
                            class="focus:outline-none"
                        >
                            <span
                                class="absolute inset-0"
                                aria-hidden="true"
                            ></span>
                            <p class="text-sm font-medium text-stone-900">{{ $patient->full_name }}</p>
                            <p class="truncate text-sm text-stone-500"># {{ $patient->id }} : {{ $patient->dob }}</p>
                        </a>
                    </div>

                    <div class="shrink-0">
                        <flux:dropdown>
                            <flux:button icon:trailing="chevron-down">Options</flux:button>
                            <flux:menu>

                                <flux:menu.item icon="plus">
                                    <flux:modal.trigger :name="'edit-profile-'.$patient->id">
                                        <a href="#">Edit profile</a>
                                    </flux:modal.trigger>
                                </flux:menu.item>

                                <flux:menu.separator />
                                <flux:menu.item
                                    variant="danger"
                                    icon="trash"
                                >Delete
                                </flux:menu.item>
                            </flux:menu>

                        </flux:dropdown>

                        <flux:modal
                            :name="'edit-profile-'.$patient->id"
                            class="w-1/2"
                        >
                            <livewire:patient-form :patient="$patient" />
                        </flux:modal>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
