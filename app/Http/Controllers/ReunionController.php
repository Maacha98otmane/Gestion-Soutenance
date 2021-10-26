<?php

namespace App\Http\Controllers;

use App\Mail\NewReunionMail;
use App\Models\formateur;
use App\Models\projet;
use App\Models\Reunion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = formateur::where('user_id', Auth::id())->value('id');
        $reunion = projet::where('formateur_id', $id)->with(['reunion'])->with(['etudiant.user'])->get();

        return view('formateur.reunion', compact('reunion'));
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
    public function store(Request $request, $id)
    {
        $reunion = Reunion::create([
            'projet_id' => $id,
            'dateReunion' => $request->input('dateReunion'),
        ]);
        $etduantid = projet::where('id', $id)->with(['etudiant.user'])->first();
        Mail::to($etduantid->etudiant->user->email)->send(new NewReunionMail($reunion));
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
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
        $reunion = reunion::find($id);
        $reunion->message = $request->input('message');
        $reunion->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
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
