<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\etudiant;
use App\Models\formateur;
use App\Models\jury;
use App\Models\projet;
use App\Models\soutenance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $president = jury::where('role', 'president')->get();
        $examinateur = jury::where('role', 'examinateur')->get();
        $invite = jury::where('role', 'invite')->get();
        $pasvalidee = projet::with(['etudiant.user', 'formateur.user', 'soutenance'])->where('status', 1)->get();

        return view('admin.pasvalide', compact('pasvalidee', 'president', 'invite', 'examinateur'));
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
        if ($id === 'formateur') {
            $formateur = formateur::with(['user', 'classe.campus'])->get();

            return view('admin.formateur', compact('formateur'));
        } elseif ($id === 'etudiant') {
            $etudiant = etudiant::with(['user', 'classe.campus'])->get();

            return view('admin.etudiant', compact('etudiant'));
        } elseif ($id === 'classe') {
            $classe = classe::with(['campus'])->get();

            return view('admin.classe', compact('classe'));
        } elseif ($id === 'validee') {
            $validee = soutenance::with(['projet.etudiant.user', 'projet.etudiant.classe.campus', 'projet.formateur.user'])->get();

            return view('admin.validee', compact('validee'));
        } elseif ($id === 'juries') {
            $juries = jury::all();

            return view('admin.juries', compact('juries'));
        } elseif ($id === 'all') {
            $user = User::inRandomOrder()->paginate(5);

            return view('admin.index', compact('user'));
        } else {
            $resultat = soutenance::with(['projet.etudiant.user', 'projet.etudiant.classe.campus', 'projet.formateur.user'])->get();

            return view('admin.resultat', compact('resultat'));
        }
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

    public function resultaccept($id)
    {
        $soutenance = soutenance::findOrFail($id);
        $soutenance->validate = 1;
        $soutenance->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function resultrefuse($id)
    {
        $soutenance = soutenance::findOrFail($id);
        $soutenance->validate = 0;
        $soutenance->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function envoie($id)
    {
        $email = [];
        $soutenance = soutenance::where('id', $id)->with(['projet.etudiant.user', 'projet.etudiant.classe.campus', 'projet.formateur.user'])->first();
        $president = jury::where('id', $soutenance->president_id)->first();
        $examinateur = jury::where('id', $soutenance->examinateur_id)->first();
        $invite = jury::where('id', $soutenance->invite_id)->first();
        array_push($email, $president->email, $examinateur->email, $invite->email);
        Mail::send('mail.jury', ['soutenance' => $soutenance], function ($message) use ($email) {
            $message->to($email)->subject('Invitation à reunion');
        });
        $soutenance->mailenvoie = 1;
        $soutenance->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function storeuser(Request $request)
    {
        $this->validate($request, [
            'nomuser' => 'required',
            'emailuser' => 'required',
            'roleuser' => 'required',
        ]);
        User::create([
            'name' => $request->nomuser,
            'email' => $request->emailuser,
            'role' => $request->roleuser,
            'password' => Hash::make('password'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function deleteuser($id)
    {
        User::destroy($id);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function deleteformateur($id)
    {
        formateur::destroy($id);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function deleteetudiant($id)
    {
        etudiant::destroy($id);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }
}
