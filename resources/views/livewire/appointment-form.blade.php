<form wire:submit.prevent="submit">

    <!-- start status/type/doctor -->
    <div class="grid grid-cols-3 gap-6 mb-4">

        <flux:select
            wire:model="status"
            placeholder="Choose status..."
            label="Status"
        >
            @foreach($statuses as $key => $value)
                <flux:select.option
                    wire:key="{{ $key }}"
                    value="{{ $key }}"
                >{{ $value }}</flux:select.option>
            @endforeach

        </flux:select>

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
        <flux:select
            wire:model="doctor_id"
            placeholder="With..."
            label="Provider / Staff"
        >
            @foreach($doctors as $doctor)
                <flux:select.option
                    wire:key="{{ $doctor->id }}"
                    value="{{ $doctor->id }}"
                >{{ $doctor->full_name }}</flux:select.option>
            @endforeach

        </flux:select>
    </div>

    <!-- start date/time and length -->
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

        <flux:select
            wire:model="duration"
            label="Duration"
            placeholder="Choose duration"
        >
            @foreach(\App\Models\Appointment::$durations as $value)
                <flux:select.option
                    wire:key="{{ $value }}"
                    value="{{ $value }}"
                >{{ $value }}</flux:select.option>
            @endforeach
        </flux:select>

        <div>@error('date_time_mismatch') {{ $message }} @enderror</div>
    </div>

    <!-- start reason -->
    <div class="grid grid-cols-1 gap-6 mb-4">
        <flux:input
            type="text"
            wire:model="reason"
            label="Reason For Visit"
            placeholder="Reason"
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
