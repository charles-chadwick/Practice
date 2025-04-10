<form wire:submit="submit">
    <div class="gap-6">

        <flux:select
            wire:model="type"
            label="Type"
            placeholder="Choose type">
            @foreach($types as $value)
                <flux:select.option
                    wire:key="{{ $value }}"
                    value="{{ $value }}"
                >{{ $value }}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:input
            type="text"
            wire:model="title"
            label="Title"
            placeholder="Title"
        />

        <flux:textarea
            wire:model="content"
            label="Content"
            placeholder="Content"
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
