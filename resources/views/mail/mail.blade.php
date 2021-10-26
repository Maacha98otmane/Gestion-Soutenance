<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Votre Etudiant envoie une demande de soutenance ,vérifie ca . <br>
    Titre de Projet : {{$projet->projet}} <br>
    Resume : {{$projet->summary}} <br>
    Cahier de charge :<a href="{{asset('cahiercharge/'.$projet->file_path)}}"  target="_blank">{{$projet->file_path}}</a> <br>
    
</body>
</html>