<x-masterDash title="Traitements">
    <div class="table-ajouter-title py-2 mt-2"> 
        <h2> Patients List for {{ $traitement->Acte }} </h2>
        <a class="btn btn-primary btn-lg action-btn" href="{{ route('traitements.Ajouter') }}"role="button" >
        Ajouter
        </a>
    </div>

    <table class="table table-bordered ">
        <tr>
            <th>NumDoss</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Actions</th>
        </tr>

        @foreach ($traitement->patients as $patient)
            <tr>
                <td>{{ $patient->NumDoss }}</td>
                <td>{{ $patient->PrenomPat }}</td>
                <td>{{ $patient->NomPat }}</td>
                <td>{{ $patient->Sexe }}</td>
                <td>{{ $patient->DateNaiss }}</td>
                <td class="text-center">
                    {{-- Les actions d'insertion,modification et suppression  --}}
                    <form action="{{ route('traitements.modifier', $patient->NumDoss) }}" method="GET"
                        style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-sm action-btn">Modifier</button>
                    </form>
                    <form action="{{ route('traitements.supprimer', $patient->NumDoss) }}" method="POST"
                        style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm action-btn">Supprimer</button>
                    </form>
                    <a class="btn btn-warning btn-sm action-btn"
                        href="{{ route('patients.Afficher',$patient->NumDoss) }}" role="button">Afficher
                        Plus</a>
                </td>
            </tr>
        @endforeach
    </table>    
</x-masterDash>