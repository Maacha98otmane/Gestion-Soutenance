<?php

namespace App\Http\Controllers;

use App\Models\classe;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function store(Request $request)
    {
        classe::create([
            'class' => $request->input('classename'),
            'campus_id' => $request->input('campusclass'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }

    public function destroy($id)
    {
        $classes = classe::findOrFail($id);
        $classes->delete($id);
        Alert::success('succès', 'Votre avez supprimé classe');

        return back();
    }

    public function update(Request $request, $id)
    {
        $form = classe::find($id);
        $form->class = $request->input('classename');
        $form->campus_id = $request->input('campusclass');
        $form->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return back();
    }
}
