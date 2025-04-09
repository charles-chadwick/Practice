<table class="table-list w-full">
    <thead>
    <tr>
        <th>Start</th>
        <th>End</th>
        <th>Type</th>
        <th>Reason</th>
        <th>Doctor</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @forelse($appointments as $appointment)
        <tr>
            <td>{{ $appointment->start }}</td>
            <td>{{ $appointment->end }}</td>
            <td>{{ $appointment->type }}</td>
            <td>{{ $appointment->reason }}</td>
            <td>Doc</td>
            <td>{{ $appointment->notes }}</td>
        </tr>

    @empty
        <tr>
            <td
                colspan="6"
                class="text-center"
            > No appointments
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
