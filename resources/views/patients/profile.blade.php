@extends("app")
@section("title", "Profile for {$patient->full_name} (#$patient->id)")
@section("subtitle")

@endsection
@section("content")
    <x-alert />

    <!-- patient information -->

    <div class="flex gap-x-4">
        <x-section class="w-2/3">
            <div class="flex">

                <!-- personal information -->
                <div class="grow">
                    <x-section-header header="Patient Information">
                        <flux:dropdown align="end">
                            <flux:button size="xs">...</flux:button>
                            <flux:menu>
                                <flux:menu.item icon="plus">
                                    <flux:modal.trigger name="patient-information">
                                        Edit Profile
                                    </flux:modal.trigger>
                                </flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                        <flux:modal
                            name="patient-information"
                            class="w-full"
                        >
                            <livewire:patient-form :patient="$patient" />
                        </flux:modal>
                    </x-section-header>
                    <div class="text-sm">
                        <!-- avatar -->
                            <img
                                src="{{ $patient->avatar }}"
                                alt="{{ $patient->full_name }}"
                                class="rounded-md w-28 h-28 drop-shadow float-left mr-4"
                            >

                        <p><span class="font-semibold">Name: </span>{{ $patient->full_name }}</p>
                        <p><span class="font-semibold">Date of Birth: </span>{{ $patient->dob }} ({{ $patient->age }})
                        </p>
                        <p><span class="font-semibold">MRN: </span> #{{ $patient->id }}</p>
                    </div>
                </div>
            </div>
        </x-section>

        <x-section class="w-1/3">
            <!-- contact information -->
            <x-section-header header="Contact Information">
                <flux:dropdown align="end">
                    <flux:button size="xs">...</flux:button>
                    <flux:menu>
                        <flux:menu.item icon="plus">
                            <flux:modal.trigger name="contact-information">
                                Create Contact
                            </flux:modal.trigger>
                        </flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
                <flux:modal
                    name="contact-information"
                    class="w-full"
                >
                    <livewire:contact-form :obj="$patient" />
                </flux:modal>
            </x-section-header>
            <div class="text-sm">
                <livewire:contact-list
                    :obj="$patient"
                    :contacts="$patient->contacts"
                />
            </div>
        </x-section>
    </div>

    <!-- appointments -->
    <x-section>
        <x-section-header header="Appointments">
            <flux:dropdown align="end">
                <flux:button size="xs">...</flux:button>
                <flux:menu>
                    <flux:menu.item icon="plus">
                        <flux:modal.trigger name="add-appointment">
                            Create Appointment
                        </flux:modal.trigger>
                    </flux:menu.item>

                </flux:menu>
            </flux:dropdown>
            <flux:modal
                name="add-appointment"
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

    <div class="flex gap-x-4">

        <!-- notes -->
        <x-section class="w-1/2">
            <x-section-header header="Notes">
                <flux:dropdown align="end">
                    <flux:button size="xs">...</flux:button>
                    <flux:menu>
                        <flux:menu.item icon="plus">
                            <flux:modal.trigger name="add-note">
                                Create Note
                            </flux:modal.trigger>
                        </flux:menu.item>

                    </flux:menu>
                </flux:dropdown>

                <flux:modal
                    name="add-note"
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

        <!-- messages -->
        <x-section class="w-1/2">
            <x-section-header header="Messages">
                <flux:dropdown align="end">
                    <flux:button size="xs">...</flux:button>
                    <flux:menu>
                        <flux:menu.item icon="plus">
                            <flux:modal.trigger name="add-discussion">
                                Create Note
                            </flux:modal.trigger>
                        </flux:menu.item>

                    </flux:menu>
                </flux:dropdown>

                <flux:modal
                    name="add-discussion"
                    class="w-full"
                >
                    <livewire:discussion-form :obj="$patient"></livewire:discussion-form>
                </flux:modal>

            </x-section-header>

            <livewire:discussion-list
                :discussions="$patient->discussions"
                :obj_on="$patient"
            />
        </x-section>
    </div>
@endsection
