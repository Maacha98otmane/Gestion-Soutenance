<?php

namespace App\Http\Controllers;

use App\Models\jury;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        jury::create([
            'name' => $request->input('nomjury'),
            'email' => $request->input('emailjury'),
            'role' => $request->input('rolejury'),
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
        $form = jury::find($id);
        $form->name = $request->input('nomjury');
        $form->email = $request->input('emailjury');
        $form->role = $request->input('rolejury');
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
        $juries = jury::findOrFail($id);
        $juries->delete($id);
        Alert::success('succès', 'Votre avez supprimé Jury');

        return back();
    }
}
