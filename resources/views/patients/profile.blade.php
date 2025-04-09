@extends("app")
@section("title", "Profile for {$patient->full_name} (#$patient->id)")
@section("content")
    @session("message")
    <div class="bg-lime-100 border-2 border-lime-500 rounded-b text-lime-900 px-4 py-3 shadow-md">
        {{ $value }}
    </div>
    @endsession
    <div class="flex gap-2 p-4 bg-white rounded shadow text-stone-800">
        <img
                src="{{ $patient->avatar }}"
                alt="{{ $patient->full_name }}"
                class="rounded-md w-28 h-28 drop-shadow"
        >
        <div class="grow pl-4">
            <h2 class="font-bold pb-2 mb-2 border-b border-b-stone-100 text-lg">Patient Information</h2>
            <p>{{ $patient->full_name }}</p>
            <p>{{ $patient->dob }}</p>
        </div>
        <div class="shrink-0">
            <flux:modal.trigger name="AddAppointment">
                <flux:button>Add Appointment</flux:button>
                <a href=""></a>
            </flux:modal.trigger>
            <flux:modal
                    name="AddAppointment"
                    class="w-full"
            >
                <livewire:appointment-form :patient="$patient" />
            </flux:modal>
        </div>

    </div>
@endsection
