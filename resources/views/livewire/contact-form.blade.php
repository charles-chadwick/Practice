<form wire:submit.prevent="submit">

    <!-- start status/type/doctor -->
    <div class="grid grid-cols-3 gap-6 mb-4">

        <flux:select
            wire:model="type"
            placeholder="Choose type..."
            label="Type"
        >
            @foreach($types as $key => $value)
                <flux:select.option
                    wire:key="{{ $key }}"
                    value="{{ $key }}"
                >{{ $value }}</flux:select.option>
            @endforeach

        </flux:select>

        <flux:input
            type="phone"
            wire:model="phone"
            label="Phone"
            placeholder="Phone"
        />
        <div>
            <flux:label class="mb-6">Primary Contact</flux:label>
            <flux:switch
                class="text-right"
                wire:model.live="is_primary"
                value="1"
                label="Yes"
            />
        </div>
    </div>

    <!-- start date/time and length -->
    <div class="grid grid-cols-1 gap-6 mb-4">
        <flux:input
            type="text"
            wire:model="address"
            label="Address"
            placeholder="Address"
        />

    </div>

    <!-- start city/state/zip -->
    <div class="grid grid-cols-3 gap-6 mb-4">

        <flux:input
            type="text"
            wire:model="city"
            label="City"
            placeholder="City"
        />

        <flux:input
            type="text"
            wire:model="state"
            label="State"
            placeholder="State"
        />

        <flux:input
            type="text"
            wire:model="zip"
            label="Zip / Postal"
            placeholder="Zip / Postal"
        />

    </div>

    <!-- start notes -->
    <div class="grid grid-cols-1 gap-6 mb-4">
        <flux:textarea
            wire:model="notes"
            label="Notes"
            placeholder="Notes"
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
