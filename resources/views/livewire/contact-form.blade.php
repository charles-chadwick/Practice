<div>

    <form
        wire:submit.prevent="submit"
        class="space-y-4 text-left"
    >
        <div class="grid grid-cols-3 space-x-4">

            <flux:radio.group
                label="Contact Type"
                variant="cards"
                class="flex"
                wire:model="type"
            >
                <flux:radio
                    value="Home"
                    checked
                >
                    <flux:radio.indicator />
                    <div class="flex-1">
                        <flux:heading class="leading-4">Home</flux:heading>
                    </div>
                </flux:radio>
                <flux:radio value="Work">
                    <flux:radio.indicator />
                    <div class="flex-1">
                        <flux:heading class="leading-4">Work</flux:heading>
                    </div>
                </flux:radio>

            </flux:radio.group>

            <div class="col-span-3 space-y-6 mt-2">
                <flux:input
                    type="text"
                    label="Phone"
                    id="phone"
                    placeholder="Phone"
                    wire:model="phone"
                />
                <flux:error for="phone"></flux:error>
                <flux:input
                    type="text"
                    label="Address"
                    id="address"
                    placeholder="Address"
                    wire:model="address"
                />
                <flux:error for="address"></flux:error>
            </div>

            <flux:input
                type="text"
                label="City"
                id="city"
                placeholder="City"
                wire:model="city"
            />
            <flux:input
                type="text"
                label="State"
                id="state"
                placeholder="State"
                wire:model="state"
            />
            <flux:input
                type="text"
                label="Zip"
                id="zip"
                placeholder="Zip"
                wire:model="zip"
            />

        </div>

        <div class="col-span-3 text-center">
            <flux:button
                type="submit"
                variant="primary">Save changes
            </flux:button>
        </div>
        <flux:input class="hidden" wire:model="patient"></flux:input>
    </form>
</div>
