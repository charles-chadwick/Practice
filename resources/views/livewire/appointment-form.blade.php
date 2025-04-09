<form wire:submit="submit">
    <div class="grid grid-cols-2 gap-6">

        <flux:input
            type="text"
            wire:model="status"
            label="Status"
            placeholder="Status"
        />

        <flux:input
            type="text"
            wire:model="type"
            label="Type"
            placeholder="Type"
        />

        <flux:input
            type="date"
            wire:model="start"
            label="Start Date"
            placeholder="Start Date"
        />

        <flux:input
            type="date"
            wire:model="end"
            label="End Date"
            placeholder="End Date"
        />

        <flux:textarea
            wire:model="reason"
            label="Description"
            placeholder="Description"
        />

        <flux:textarea
            wire:model="notes"
            label="Notes"
            placeholder="Notes"
        />

    </div>
    <div class="text-center gap-4 pt-6 ">
        <button
            type="submit"
            class="btn-primary"
        >Save
        </button>

    </div>
</form>
