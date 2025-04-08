<div class="px-2">
    <h2 class="section-header">Contact Info</h2>
    <ul>
        @forelse($contacts as $contact)

            <li class="pb-2 text-sm">
                @if ($contact->phone !== "")
                    <p><span class="font-bold">{{ $contact->type }} Ph:</span> {{ $contact->phone }}</p>
                @endif
                @if ($contact->address !== "")
                    <p><span class="font-bold">{{ $contact->type }} Address:</span> {{ $contact->address }}
                        {{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}
                    </p>
                @endif
            </li>
        @empty
            <li class="text-sm">No Contact Info Available.</li>
        @endforelse
    </ul>
</div>
