<form wire:submit="submit">
    <div class="gap-6">

        <flux:select
            wire:model="user_id"
            placeholder="From..."
            label="From Provider / Staff"
        >
            @foreach($users as $user)
                <flux:select.option
                    wire:key="{{ $user->id }}"
                    value="{{ $user->id }}"
                >{{ $user->full_name }}</flux:select.option>
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
