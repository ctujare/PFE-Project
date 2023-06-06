<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Requests\TraitementRequest;
use App\Models\Patients;
use App\Models\Traitement;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    public function Traitindex()
    {
        $traitements = Traitement::with('patients')->paginate(10);
        $patients = Patients::paginate(10);

        return view('dashboardpages.Traitements', compact('traitements', 'patients'));
    }

    public function Ajouter()
    {
        return view('Traitements.Ajouter');
    }

    public function supprimer(Patients $patient)
    {
        $patient->delete();
        return redirect()
            ->route('patientspage')
            ->with('success', 'Patient a été bien supprimé ');
    }

    public function modifier(Patients $patient, Traitement $traitement)
    {
        return view('Traitements.modifier', compact('patient', 'traitement'));
    }

    // public function update(PatientRequest $request, Traitement $traitement)
    // {
    //     $formFields = $request->validated();

    //     //  Stocker les fichiers dans la base de donnée
    //     $traitement->fill($formFields)->save();
    //     return to_route('traitements.modifier', $traitement->Num_Traitement)->with('success', 'Le Patient a été bien modifié ');
    // }

    public function update(PatientRequest $request, Traitement $traitement)
    {
        $formFields = $request->validated();

        // Store the updated data in the database
        $traitement->update($formFields);

        return redirect()
            ->route('traitements.modifier', $traitement->Num_Traitement)
            ->with('success', 'Le Patient a été bien modifié ');
    }

    public function store(TraitementRequest $request)
    {
        // Validation des données par PatientRequest :
        $formFields = $request->validated();

        // Insertion des données dans la table patients :

        Traitement::create($formFields);

        return redirect()
            ->route('patientspage')
            ->with('success', 'Patient ajouté avec succès.');
    }

    public function list_patients($traitement)
    {
        $traitement = Traitement::find($traitement);
        return view('dashboardpages.Patient_Traitements', compact('traitement'));
        // return $traitement->patients;
    }
}
