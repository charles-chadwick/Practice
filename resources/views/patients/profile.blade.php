@extends("app")
@section("title", "Profile for {$patient->full_name}")
@section("content")
    <div class="bg-white shadow-sm p-4">
        <div class="flex gap-4 justify-stretch">
            <div class="flex-none">
                <img
                    src="{{ $patient->avatar }}"
                    alt="{{ $patient->full_name }}"
                    class="inline-block rounded-md mask-clip-border size-40 border-2 border-stone-200 shadow-xs"
                >
            </div>
            <div class="grow">
                <h2 class="font-bold">{{ $patient->full_name }} (#{{ $patient->id }})</h2>
                <p>DOB: {{ $patient->dob }}</p>
                <p>Age: {{ $patient->age }}</p>
                <p>Email: {{ $patient->email }}</p>
            </div>
            <div class="flex-none text-right">
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
@endsection
