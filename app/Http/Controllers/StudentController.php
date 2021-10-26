<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\etudiant;
use App\Models\projet;
use App\Models\Reunion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = etudiant::with(['user'])->where('user_id', Auth::id())->first();
        $classe = classe::all();
        if (!$check) {
            return view('student.index', compact('classe', 'check'));
        } else {
            $datesoutenace = etudiant::where('user_id', Auth::id())->with(['projet.soutenance'])->first();
            if ($datesoutenace->projet === null) {
                return view('student.index', compact('classe', 'check', 'datesoutenace'));
            } else {
                $datereunion = Reunion::where('projet_id', $datesoutenace->projet->id)->get();
                $data = [];
                foreach ($datereunion as $start) {
                    array_push($data, [
                        'title' => 'Reunion',
                        'id' => $start->id,
                        'start' => $start->dateReunion,
                        'message' => $start->message,
                     ]);
                }
                $data = json_encode($data);

                return view('student.index', compact('classe', 'datesoutenace', 'check', 'data'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projet = projet::with(['soutenance'])->where('etudiant_id', etudiant::where('user_id', Auth::id())->value('id'))->first();

        return view('student.form.etat', compact('projet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        etudiant::create([
            'user_id' => Auth::user()->id,
            'CIN' => $request->input('CIN'),
            'datenaissance' => $request->input('datenaissance'),
            'ville' => $request->input('ville'),
            'telephone' => $request->input('tele'),
            'class_id' => $request->input('classe'),
        ]);
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
