@extends("app")
@section("title", "Profile for {$patient->full_name} (#$patient->id)")
@section("subtitle")

@endsection
@section("content")
    <x-alert />
    <div class="flex gap-2 p-4 mb-4 bg-white rounded shadow text-stone-800">
        <img
            src="{{ $patient->avatar }}"
            alt="{{ $patient->full_name }}"
            class="rounded-md w-28 h-28 drop-shadow"
        >
        <div class="grow pl-4">
            <x-section-header header="Patient Information"></x-section-header>
            <p><span class="font-semibold">Name: </span>{{ $patient->full_name }}</p>
            <p><span class="font-semibold">Date of Birth: </span>{{ $patient->dob }} ({{ $patient->age }})</p>
            <p><span class="font-semibold">MRN: </span> #{{ $patient->id }}</p>
        </div>
    </div>

    <x-section>
        <x-section-header header="Appointments">
            <flux:modal.trigger name="AddAppointment">
                <flux:button>Add Appointment</flux:button>
            </flux:modal.trigger>
            <flux:modal
                name="AddAppointment"
                class="w-full"
            >
                <livewire:appointment-form :patient="$patient" />
            </flux:modal>
        </x-section-header>

        <livewire:appointment-list
            :patient="$patient"
            :appointments="$patient->appointments"
        ></livewire:appointment-list>
    </x-section>

    <x-section class="w-1/2">
        <x-section-header header="Notes">
            <flux:modal.trigger name="AddNote">
                <flux:button>Add Note</flux:button>
            </flux:modal.trigger>

            <flux:modal
                name="AddNote"
                class="w-full"
            >
                <livewire:note-form :obj="$patient"></livewire:note-form>
            </flux:modal>
        </x-section-header>

        <livewire:note-list
            :notes="$patient->notes"
            :obj_on="$patient"
        />
    </x-section>
@endsection
