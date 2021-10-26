<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reunion</title>
</head>
<body>
Madame/Mademoiselle/Monsieur,<br>

Nous avons le plaisir de vous informer de la tenue d'une réunion .<br>

Elle se déroulera le <strong>{{$soutenance->dateDefense}}</strong> dans nos locaux de Safi.<br>

Cette réunion aura pour objectif d'une soutenance "Fil Rouge" de l'etudiant <strong>{{$soutenance->projet->etudiant->user->name}}</strong> concernat le projet <strong>"{{$soutenance->projet->projet}}"</strong>. <br>
Encadre Par <strong>{{$soutenance->projet->formateur->user->name}}</strong> <br>
Je vous prie d'agréer, Madame/Mademoiselle/Monsieur, l'expression de mes cordiales salutations. <br>
</body>
</html>