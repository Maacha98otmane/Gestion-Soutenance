@extends('layouts.sidebar')
@section('content')

@forelse ($projet as $projets)
@if($projets->status === 0)
<div class="alert alert-danger text-center" role="alert">
    Votre demande est refusée car {{ Str::upper($projets->message)}}.
    Veuillez le modifier
</div>

@elseif($projets->status === 1)
<div class="alert alert-success text-center" role="alert">
    Demande acceptée. Suivez-le en cliquant sur <a href="{{route('etudiant.create')}}"><strong>ce lien</strong></a> .
</div>
@else
<div class="alert alert-info text-center" role="alert">
    Demande pas encore acceptée par ton formateur.
</div>
@endif
<div class="card text-center mt-5">
    <div class="card-header font-weight-bold">
        Vous avez déja créer un formulaire
    </div>
    <div class="card-body text-left">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>Nom Complet : {{ $projets->etudiant->user->name}}</td>
                    <td>Email : {{ $projets->etudiant->user->email }}</td>
                    <td>CIN : {{ $projets->etudiant->CIN }}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Date de naissance : {{ $projets->etudiant->datenaissance }}</td>
                    <td>Ville : {{ $projets->etudiant->ville }}</td>
                    <td>Téléphone : {{ $projets->etudiant->telephone }}</td>

                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>Class : {{ $projets->etudiant->classe->class }}</td>
                    <td>Formateur: {{ $projets->formateur->user->name }}</td>
                    <td>Projet : {{ $projets->projet }}</td>

                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>Résumé : {{ $projets->summary }}</td>
                </tr>

            </tbody>
        </table>
        <div class="text-center">

            {{ $projets->updated_at->diffForHumans()}}
        </div>
    </div>
    <div class="card-footer text-muted">
        @if($projets->status === 1)
        <!-- Large modal -->
        <form class="d-inline ml-3" action="{{route('download')}}" method="Get">
            @CSRF
            <button class="btn-sm btn-success"><i class="fas fa-download"> Telecharger</i></button>
        </form>
        @else
        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="fas fa-edit"> Modifier</i>
        </button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editer Votre Formulaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <form action="{{ route('projet.update', $projets->id) }}" method="Post">
                                @CSRF
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname">Nom Complet:</label>
                                            <div class="inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="nomcomplet" id="nomcomplet"
                                                        value="{{ old('nomcomplet',auth()->user()->name) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="mail" name="email" id="email"
                                                        value="{{ old('email',auth()->user()->email) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="CIN">CIN :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="CIN" id="CIN"
                                                        value="{{ old('CIN',$projets->etudiant->CIN ) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="birthday">Date de naissance :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="date" name="datenaissance" id="datenaissance"
                                                        value="{{ old('datenaissance',$projets->etudiant->datenaissance) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="city">Ville :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="ville" id="ville"
                                                        value="{{ old('ville', $projets->etudiant->ville) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="phone">Téléphone :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="telephone" id="telephone"
                                                        value="{{ old('telephone', $projets->etudiant->telephone) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="class">Class :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="class" id="class"
                                                        value="{{ old('class',$projets->etudiant->classe->class) }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="class">Formateur :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="formateur" id="formateur"
                                                        value="{{ old($projets->formateur->user->name) }}"
                                                        placeholder="formateur" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="project">Projet :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="text" name="projet" id="projet"
                                                        value="{{ old('project', $projets->projet) }}"
                                                        placeholder="project" class="form-control" required>
                                                </div>
                                                @foreach($errors->get('project') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="summary">Resumé :</label>
                                            <div class=" inputGroupContainer">
                                                <div class="input-group">
                                                    <textarea name="summary" class="form-control" id="summary"
                                                        placeholder="summary" rows="3" required>
                                                {{ old('summary',$projets->summary) }}</textarea>

                                                </div>
                                                @foreach($errors->get('summary') as $error)
                                                <small class="text-danger">{{ $error }}</small>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="d-inline ml-3" action="{{ route('projet.destroy', $projets->id)}}" method="Post">
            @CSRF
            @method('DELETE')
            <button type="submit" class="btn-sm btn-danger d-inline">
                <i class="fas fa-trash-alt"> Supprimer</i>
            </button>
        </form>
        <form class="d-inline ml-3" action="{{route('download')}}" method="Get">
            @CSRF
            <button class="btn-sm btn-success"><i class="fas fa-download"> Telecharger</i></button>
        </form>
        @endif
    </div>
</div>
@empty
@if (!$etudiant)
<script>
    window.location = "/etudiant";

</script>
@else
@if($formateurs)
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form id="regForm" action="{{ route('projet.store',$etudiant->id)}}" method="POST"
                enctype="multipart/form-data">
                @CSRF
                <h1 id="register">Register</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span
                        class="step"></span> <span class="step"></span> </div>

                <div class="tab">
                    <div class="form-group">
                        <label for="firstname" class="col control-label">Nom Complet :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" name="nomcomplet" id="nomcomplet" value="{{auth()->user()->name}}"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CIN" class="col control-label">CIN :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" name="CIN" id="CIN" value="{{ $etudiant->CIN }}" class="form-control"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthday" class="col control-label">Date de naissance :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="date" name="birthday" id="birthday" value="{{ $etudiant->datenaissance }}"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col control-label">Ville :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" name="city" id="city" value="{{ $etudiant->ville }}"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="form-group">
                        <label for="email" class="col control-label">Email :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="mail" name="email" id="email" value="{{ auth()->user()->email }}"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col control-label">Téléphone :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" name="phone" id="phone" value="{{ $etudiant->telephone }}"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="form-group">
                        <label for="formateur" class="col control-label">Formateur :</label>
                        <div class="col ">
                            <div class="input-group">
                                <select name="formateur" id="formateur" class="form-control" readonly>
                                    <option value="{{$formateurs->id}}">{{$formateurs->user->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class" class="col control-label">Class :</label>
                        <div class="col ">
                            <div class="input-group">
                                <select name="class" id="class" class="form-control" disabled>
                                    <option value="{{$etudiant->classe->id}}">{{$etudiant->classe->class}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab">

                    <div class="form-group">
                        <label for="project" class="col control-label">Votre Projet :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" name="project" id="project" value="{{ old('project') }}"
                                    placeholder="project" class="form-control" required>
                            </div>
                            @foreach($errors->get('project') as $error)
                            <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="summary" class="col control-label">Résumé :</label>
                        <div class="col ">
                            <div class="input-group">
                                <textarea name="summary" class="form-control" id="summary" placeholder="summary"
                                    rows="3" required>{{ old('summary') }}</textarea>
                            </div>
                            @foreach($errors->get('summary') as $error)
                            <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cahiercharge" class="col control-label">Votre Cahier Charge :</label>
                        <div class="col ">
                            <div class="input-group">
                                <input type="file" name="cahiercharge" id="cahiercharge" class="form-control" required>
                            </div>
                            @foreach($errors->get('cahiercharge') as $error)
                            <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="alert text-center mt-5 alert-warning" role="alert">
    Votre Formateur pas encore lancer la reservation
</div>
@endif
@endif

@endforelse

@endsection
