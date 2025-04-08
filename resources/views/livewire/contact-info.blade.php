<div class="px-2">
    <h2 class="font-bold border-b border-gray-200 pb-2">Contact Info</h2>
    <ul>
        @foreach($contacts as $contact)

            <li class="py-2 text-sm">
                @if ($contact->phone !== "") <p><span class="font-bold">{{ $contact->type }} Ph:</span> {{ $contact->phone }}</p> @endif
                @if ($contact->address !== "") <p><span class="font-bold">{{ $contact->type }} Address:</span> {{ $contact->address }}
                    {{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}
                    </p> @endif
            </li>

        @endforeach
    </ul>
</div>
