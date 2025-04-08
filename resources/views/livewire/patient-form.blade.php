<form
    wire:submit="submit"
    class="space-y-6 text-left">
    <div>
        <flux:heading size="lg">
            @if ($action === "update")
                Profile For {{ $first }} {{ $last }}
            @else
                Create Patient Profile
            @endif
        </flux:heading>
    </div>
    <div class="grid grid-cols-3 space-y-6 space-x-4">
        <flux:input
            wire:model="first"
            label="First"
            placeholder="First Name"/>
        <flux:error for="first"></flux:error>

        <flux:input
            wire:model="middle"
            label="Middle"
            placeholder="Middle Name"/>
        <flux:error for="middle"></flux:error>

        <flux:input
            wire:model="last"
            label="Last"
            placeholder="Last Name"/>
        <flux:error for="last"></flux:error>

        <flux:input
            wire:model="dob"
            label="Date of birth"
            type="date"/>
        <flux:error for="dob"></flux:error>

        <flux:input
            wire:model="gender"
            label="Gender"
            type="text"/>
        <flux:error for="gender"></flux:error>

        <flux:spacer/>

        <div class="col-span-3 text-center">
            <flux:button
                type="submit"
                variant="primary">Save changes
            </flux:button>
        </div>

    </div>
</form>
