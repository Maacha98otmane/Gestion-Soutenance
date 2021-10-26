<?php

namespace App\Http\Controllers;

use App\Mail\NewProjetMail;
use App\Models\etudiant;
use App\Models\formateur;
use App\Models\jury;
use App\Models\projet;
use App\Models\soutenance;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = etudiant::where('user_id', Auth::id())->with(['classe'])->first();
        $projets = projet::with(['etudiant.classe', 'formateur.user'])->where('etudiant_id', etudiant::where('user_id', Auth::id())->value('id'))->get();
        $formateurs = formateur::with(['user'])->where('class_id', etudiant::where('user_id', Auth::id())->value('class_id'))->first();

        return view('student.form.index',
        [
        'etudiant' => $etudiants,
        'projet' => $projets,
        ], compact('formateurs')
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // GETProjet Status
    public function create()
    {
        $projetnotaccepted = projet::with(['etudiant.user'])->whereNull('status')->where('formateur_id', formateur::where('user_id', Auth::id())->value('id'))->paginate(10);

        return view('formateur.notaccepted', compact('projetnotaccepted'));
    }

    public function AccepteProjet()
    {
        $projetaccepted = projet::with(['etudiant.user', 'soutenance'])->
        where('status', 1)->
        where('formateur_id', formateur::where('user_id', Auth::id())->value('id'))->paginate(10);
        $president = jury::where('role', 'president')->get();
        $examinateur = jury::where('role', 'examinateur')->get();
        $invite = jury::where('role', 'invite')->get();
        // $soutenance = soutenance::with(['jury'])->get();
        // dd($soutenance);

        return view('formateur.accepted', compact('projetaccepted', 'president', 'invite', 'examinateur'));
    }

    public function Accepte($id)
    {
        $projet = projet::findOrFail($id);
        $projet->status = 1;
        $projet->message = null;
        $projet->save();

        return back();
    }

    public function RefusedProjet()
    {
        $projetrefused = projet::with(['etudiant.user'])->where('status', 0)->
        where('formateur_id', formateur::where('user_id', Auth::id())->value('id'))->
        paginate(10);

        return view('formateur.refused', compact('projetrefused'));
    }

    public function Refuse(Request $request)
    {
        $projet = projet::findOrFail(request('id'));
        $projet->status = 0;
        $projet->message = $request->input('message');
        $projet->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'cahiercharge' => 'required|mimes:pdf|max:1024',
            ]);
        $file = $request->cahiercharge->getClientOriginalExtension();
        $namecahiercharge = time().'_'.auth()->user()->name.'.'.$file;
        $path = 'cahiercharge';
        $request->cahiercharge->move($path, $namecahiercharge);
        $projet = projet::create([
            'etudiant_id' => $id,
            'formateur_id' => $request->input('formateur'),
            'projet' => $request->input('project'),
            'summary' => $request->input('summary'),
            'file_path' => $namecahiercharge,
    ]);
        $formateuremail = formateur::where('id', $request->input('formateur'))->with(['user'])->first();
        Mail::to($formateuremail->user->email)->send(new NewProjetMail($projet));
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
        $form = projet::find($id);
        $form->projet = $request->input('projet');
        $form->summary = $request->input('summary');
        $form->status = null;
        $form->message = null;
        $form->save();
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
        $projets = projet::findOrFail($id);
        $projets->delete($id);
        Alert::success('succès', 'Votre avez supprimé le formulaire');

        return redirect()->route('etudiant.index');
    }

    public function generatePDF()
    {
        $projets = projet::with(['etudiant.classe', 'formateur.user'])->where('etudiant_id', etudiant::where('user_id', Auth::id())->value('id'))->get();
        $pdf = PDF::loadView('student.download', [
            'projet' => $projets,
        ]);

        return $pdf->download('form.pdf');
    }
}
