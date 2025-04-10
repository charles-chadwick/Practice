<div>
    @forelse($contacts as $contact)
        @if ($contact->is_primary)
            <p><span class="font-bold">Phone: </span>{{ $contact->phone }}</p>
            @if ($contact->address !== null)
                <p>
                    <span class="font-bold">Address: </span>{{ $contact->address }} {{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}
                </p>
            @endif
        @endif
    @empty
        <p>There are no contacts.</p>
    @endforelse
</div>
