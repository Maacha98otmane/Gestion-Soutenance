<!DOCTYPE html>
<html>
@forelse($projet as $projets)

<head>
    <title>Form</title>
    <style>
        #formulaire {
            border-collapse: collapse;
            width: 100%;
        }

        #formulaire td {
            border: 1px solid #ddd;
            padding: 8px;
            line-height: 40px;
        }

        #formulaire tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .sign {
            padding-left: 32rem;
        }

        .img {
            padding-left: 30rem;
        }

        footer {
            padding-top: 8rem;
        }

        .footer {
            padding-left: 30rem;
        }

    </style>
</head>

<body>
    <img src="storage/yc.png" style="width: 20%" alt="">
    <h1 style="margin-left: 18rem;">Formulaire</h1><br><br>
    <table id="formulaire">
        <tr>
            <th scope="row"></th>
            <td><strong>Nom Complet : </strong>{{ $projets->etudiant->user->name}}</td>
            <td><strong>Email : </strong>{{ $projets->etudiant->user->email }}</td>
            <td><strong>CIN : </strong>{{ $projets->etudiant->CIN }}</td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td><strong>Date de naissance : </strong>{{ $projets->etudiant->datenaissance }}</td>
            <td><strong>Ville : </strong>{{ $projets->etudiant->ville }}</td>
            <td><strong>Téléphone : </strong>{{ $projets->etudiant->telephone }}</td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td><strong>Class : </strong>{{ $projets->etudiant->classe->class }}</td>
            <td><strong>Formateur: </strong>{{ $projets->formateur->user->name }}</td>
            <td><strong>Projet : </strong>{{ $projets->projet }}</td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td><strong>Résumé : </strong>{{ $projets->summary }}</td>
            <td></td>
        </tr>
    </table>
    <footer>
        <hr>
        <div class="footer">
            <p>{{ date('Y-m-d H:i:s') }}</p>
        </div>
    </footer>
</body>
@empty
no form
@endforelse

</html>
