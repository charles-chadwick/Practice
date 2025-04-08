@extends("app")
@section("title", "Patients")
@section("content")
    <div class="bg-white shadow-sm p-4">
        <table class="border-collapse w-full text-sm">
            <thead>
            <tr>
                <th class="px-4 py-2 bg-lime-600 text-lime-50">First</th>
                <th class="px-4 py-2 bg-lime-600 text-lime-50">Middle</th>
                <th class="px-4 py-2 bg-lime-600 text-lime-50">Last</th>
                <th class="px-4 py-2 bg-lime-600 text-lime-50">Date of Birth</th>
                <th class="px-4 py-2 bg-lime-600 text-lime-50">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                <tr class="hover:bg-stone-100">
                    <td class="px-4 py-2 border border-stone-200">{{ $patient->first }}</td>
                    <td class="px-4 py-2 border border-stone-200">{{ $patient->middle }}</td>
                    <td class="px-4 py-2 border border-stone-200">{{ $patient->last }}</td>
                    <td class="px-4 py-2 border border-stone-200">{{ $patient->dob }}</td>
                    <td class="px-4 py-2 border border-stone-200 text-center">
                        <flux:modal.trigger :name="'edit-profile-'.$patient->id"><a href="#">Edit Profile</a></flux:modal.trigger>
                        <flux:modal :name="'edit-profile-'.$patient->id">
                            <livewire:patient-form :patient="$patient" />
                        </flux:modal>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
