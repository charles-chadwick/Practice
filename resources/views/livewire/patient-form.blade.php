<form wire:submit.prevent="submit">

    <!-- start nane-->
    <div class="grid grid-cols-3 gap-6 mb-4">

        <flux:input
            type="text"
            wire:model="first"
            label="First Name"
            placeholder="First Name"
        />

        <flux:input
            type="text"
            wire:model="middle"
            label="Middle Name"
            placeholder="Middle Name"
        />

        <flux:input
            type="text"
            wire:model="last"
            label="Last Name"
            placeholder="Last Name"
        />

    </div>

    <div class="grid mb-4">

        <flux:input
            type="email"
            wire:model="email"
            label="Email"
            placeholder="Email"
        />

    </div>

    <!-- start email/dob/gender-->
    <div class="grid grid-cols-3 gap-6 mb-4">

        <flux:input
            type="date"
            wire:model="dob"
            label="Date of Birth"
            placeholder="Date of Birth"
        />

        <flux:input
            type="text"
            wire:model="gender"
            label="Gender"
            placeholder="Gender"
        />

    </div>

    <!-- start submit -->
    <div class="text-center gap-4 pt-6 ">
        <button
            type="submit"
            class="btn-primary"
        >Save
        </button>

    </div>
</form>
