<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\formateur;
use App\Models\jury;
use App\Models\projet;
use App\Models\soutenance;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = formateur::with(['user'])->where('user_id', Auth::id())->get();
        $classe = classe::all();
        $id = formateur::where('user_id', Auth::id())->value('id');
        $notTreated = projet::whereNull('status')->where('formateur_id', $id)->count();
        $accepted = projet::where('status', 1)->where('formateur_id', $id)->count();
        $refused = projet::where('status', 0)->where('formateur_id', $id)->count();

        return view('formateur.index', [
            'notTreated' => $notTreated,
            'accepted' => $accepted,
            'refused' => $refused,
            'classe' => $classe,
         ], compact('check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        formateur::create([
            'user_id' => Auth::user()->id,
            'telephone' => $request->input('telephone'),
            'address' => $request->input('adresse'),
            'class_id' => $request->input('classe'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function telechargejury($id)
    {
        $defense = soutenance::findOrFail($id);
        $president = jury::find($defense->president_id);
        $examinateur = jury::find($defense->examinateur_id);
        $invite = jury::find($defense->invite_id);
        $stc = soutenance::with(['projet.etudiant.user', 'projet.etudiant.classe.campus', 'projet.formateur.user'])->where('id', $id)->first();
        $pdf = PDF::loadView('formateur.download', ['stc' => $stc, 'president' => $president, 'examinateur' => $examinateur, 'invite' => $invite]);

        return $pdf->download('soutenance.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
