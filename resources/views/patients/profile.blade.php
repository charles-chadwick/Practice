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
            <h2 class="font-bold pb-2 mb-2 border-b border-b-stone-100 text-lg">Patient Information</h2>
            <p><span class="font-semibold">Name: </span>{{ $patient->full_name }}</p>
            <p><span class="font-semibold">Date of Birth: </span>{{ $patient->dob }} ({{ $patient->age }})</p>
            <p><span class="font-semibold">MRN: </span> #{{ $patient->id }}</p>
        </div>
    </div>

    <div class="p-4 mb-4 bg-white rounded shadow text-stone-800">
        <div class="flex mb-4 gap-2">
            <div class="grow">
                <h2 class="font-bold">Appointments</h2>
            </div>
            <div class="shrink-0">
                <flux:modal.trigger name="AddAppointment">
                    <flux:button>Add Appointment</flux:button>
                </flux:modal.trigger>
                <flux:modal
                    name="AddAppointment"
                    class="w-full"
                >
                    <livewire:appointment-form :patient="$patient" />
                </flux:modal>
            </div>
        </div>

        <livewire:appointment-list
            :patient="$patient"
            :appointments="$patient->appointments"
        ></livewire:appointment-list>
    </div>

    <div class="p-4  mb-4 bg-white rounded shadow text-stone-800 w-1/2">
        <div class="flex mb-4 gap-2">
            <div class="grow">
                <h2 class="font-bold">Notes</h2>
            </div>
            <div class="shrink-0">
                <flux:modal.trigger name="AddNote">
                    <flux:button>Add Note</flux:button>
                </flux:modal.trigger>

            </div>
            <flux:modal
                name="AddNote"
                class="w-full"
            >
                <livewire:note-form :obj="$patient"></livewire:note-form>
            </flux:modal>
        </div>
        <livewire:note-list :notes="$patient->notes" :obj_on="$patient" />
    </div>
@endsection
