<form wire:submit="submit">
    <div class="grid grid-cols-2 gap-6 mb-4">


        <flux:select
            wire:model="status"
            placeholder="Choose status..."
            label="Status"
        >
            @foreach(\App\Enums\AppointmentStatus::toArray() as $key => $value)
                <flux:select.option
                    wire:key="{{ $key }}"
                    value="{{ $key }}"
                >{{ $value }}</flux:select.option>
            @endforeach

        </flux:select>

        <flux:input
            type="text"
            wire:model="type"
            label="Type"
            placeholder="Type"
        />
    </div>

    <div class="grid grid-cols-3 gap-6 mb-4">
        <flux:input
            type="date"
            wire:model="start_date"
            label="Start Date"
            placeholder="Start Date"
        />
        <flux:input
            type="time"
            wire:model="start_time"
            label="Time"
            placeholder="Time"
        />
        <flux:input
            type="number"
            wire:model="duration"
            label="Duration"
            placeholder="Duration"
        />
    </div>
    <div class="grid grid-cols-1 gap-6 mb-4">
        <flux:input
            type="text"
            wire:model="reason"
            label="Reason For Visit"
            placeholder="Reason"
        />
    </div>

    <div class="grid grid-cols-1 gap-6 mb-4">
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
