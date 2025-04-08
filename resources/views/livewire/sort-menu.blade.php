<form class="flex justify-between items-center mr-8">
    <flux:select wire:model="sort_by" wire:change="sortBy" variant="listbox" placeholder="Sort By...">
        @foreach($options as $field => $label)
            <flux:select.option value="{{ $field }}">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
    <flux:button.group>
        <flux:button variant="filled" wire:click="sortBy('asc')" wire:model="sort_direction" value="asc">Asc</flux:button>
        <flux:button variant="filled" wire:click="sortBy('desc')"  wire:model="sort_direction" value="desc">Desc</flux:button>
    </flux:button.group>
</form>
