<div>
    <label
        for="location"
        class="block text-sm/6 font-bold text-stone-900"
    >Sort By</label>
    <div class="mt-2 grid grid-cols-2">
        <select
            wire:model="sort_by"
            wire:change="sortBy"
            id="location"
            name="location"
            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-stone-900 outline outline-1 -outline-offset-1 outline-stone-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
        >
            @foreach($options as $field => $label)
                <option value="{{ $field }}">{{ $label }}</option>
            @endforeach
        </select>
        <svg
            class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-stone-500 sm:size-4"
            viewBox="0 0 16 16"
            fill="currentColor"
            aria-hidden="true"
            data-slot="icon"
        >
            <path
                fill-rule="evenodd"
                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd"
            />
        </svg>
        <fieldset>
            <div class="mt-2 ml-4 space-y-6 sm:flex sm:items-center sm:space-x-4 sm:space-y-0">
                <div class="flex items-center">
                    <input
                        wire:click="sortBy"
                        wire:model="sort_direction"
                        type="radio"
                        value="asc"
                        class="relative size-4 appearance-none rounded-full border border-stone-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-stone-300 disabled:bg-stone-100 disabled:before:bg-stone-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden"
                    >
                    <label
                        for="email"
                        class="ml-3 block text-sm/6 font-medium text-stone-900"
                    >Asc</label>
                </div>
                <div class="flex items-center">
                    <input
                        wire:click="sortBy"
                        wire:model="sort_direction"
                        type="radio"
                        value="desc"
                        class="relative size-4 appearance-none rounded-full border border-stone-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-stone-300 disabled:bg-stone-100 disabled:before:bg-stone-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden"
                    >
                    <label
                        for="desc"
                        class="ml-3 block text-sm/6 font-medium text-stone-900"
                    >Desc</label>
                </div>
            </div>
        </fieldset>


    </div>
</div>
