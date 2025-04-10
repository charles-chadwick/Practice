<form wire:submit="submit">
    <div class="gap-6">

        <flux:input
            type="text"
            wire:model="type"
            label="Type"
            placeholder="Type"
        />

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
