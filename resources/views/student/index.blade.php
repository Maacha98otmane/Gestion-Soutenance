@extends('layouts.sidebar')
@section('content')
{{-- {{$datesoutenace->projet->soutenance->dateDefense}}
{{$data}} --}}
<style>
    .rounded {
    border-radius: 1rem !important;
}
.countdown {
    text-transform: uppercase;
    font-weight: bold;
}
.bg-gradient-4 {
    background: linear-gradient(to right, #232323, #d8dfdc);
}
</style>
@if($check)
<div class="card centerM text-center">
    <div class="card-header">
        Bonjour {{ Auth::user()->name}}
    </div>
    <div class="card-body">
        <p class="text-dark">
            YouCode… Ce n’est pas un simple nom. C’est toute une philosophie. YouCode est une école inclusive
            qui ouvre les chances à tous.
            You… comme… toi. YouCode place l’individu au centre de sa pédagogie en même temps qu’elle l’aide à
            développer une synergie de travail
            avec les autres . Code… comme code. Du site web aux algorithmes en passant par les applis. Située
            dans des villes comme Youssoufia ou Safi,
            des villes propices pour y étudier le code, loin de l’effervescence des grandes villes.
        </p>
    </div>
</div>
<h1></h1>
@if ($datesoutenace->projet)
<div class="row">
    <div id="calendar" class="col-12 mt-3 col-md-6"></div>
    @if($datesoutenace->projet->soutenance)
    <div class="col mt-4">
        <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
            <p class="mb-0 font-weight-bold text-uppercase">Votre Date de Soutenance Viendra le :</p>
            <div id="clock-c" class="countdown py-4"></div>
        </div>
        <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
            <p class="mb-0 font-weight-bold text-uppercase">Resultat :</p>
            @if ($datesoutenace->projet->soutenance->validate === null)
                <h1>Pas Encore</h1>
            @elseif($datesoutenace->projet->soutenance->validate === 1)
            <h1>Admis</h1>
            @else
            <h1>Non admis</h1>
            @endif
        </div>
    </div>
        @else
        <div class="col">
            <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
                <p class="mb-0 font-weight-bold text-uppercase">Date soutenance Pas encore Affecter</p>
            </div>
        </div>
    @endif        
</div>
<script src="{{ asset('js/fullcalendar.js') }}" defer></script>
<script>
    
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            locale: 'fr',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: <?php echo $data; ?>,
            eventColor: '#31353D',
            selectable: true,
            selectHelper: true,
            eventClick: function(calEvent) {
                if (!calEvent.message) {
                    calEvent.message = 'Pas Encore'
                } 
                Swal.fire({
                    icon: 'info',
                    title: 'Resume',
                    html: `<h1>`+calEvent.message+`</h1>`,
                })

            }
        })
    })
</script>
@if($datesoutenace->projet->soutenance)

<script>
    // Set the date we're counting down to
    var countDownDate = new Date(<?php echo json_encode($datesoutenace->projet->soutenance->dateDefense); ?>).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("clock-c").innerHTML = 
      "<span class='h1 font-weight-bold'>"+days+"</span>"+ "J " 
      + "<span class='h1 font-weight-bold'>"+hours+"</span>"+ "H "
      + "<span class='h1 font-weight-bold'>"+minutes+"</span>"+ "m "
      + "<span class='h1 font-weight-bold'>"+seconds+"</span>"+ "s ";
      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("clock-c").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
    @else
    @endif
@endif

@else
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                    <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i>
                    </div>
                    <p class="mb-0 mt-2 font-italic">"Cher {{auth()->user()->name}},<br>
                        Cliquez sur le bouton ci-dessous pour compléter votre profil."</p>
                    <footer class="pt-4 mt-4 border-top text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            Completer
                        </button>
                    </footer>
                </blockquote>

            </div>
        </div>
    </div>
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Completez votre Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form action="{{route('etudiant.store')}}" method="Post">
                        @CSRF
                        <div class="form-group">
                            <label for="name">Votre CIN :</label>
                            <input type="text" class="form-control" id="CIN" name="CIN" />
                        </div>
                        <div class="form-group">
                            <label for="university">Votre Date de Naissance :</label>
                            <input type="date" class="form-control" id="datenaissance" name="datenaissance" />
                        </div>
                        <div class="form-group">
                            <label for="department">Votre Ville :</label>
                            <input type="text" class="form-control" id="ville" name="ville" />
                        </div>
                        <div class="form-group">
                            <label for="email">Votre Telephone :</label>
                            <input type="mail" class="form-control" id="tele" name="tele" />
                        </div>
                        <div class="form-group">
                            <label for="classe">Votre Classe :</label>
                            <select name="classe" id="classe" class="form-control" required>
                                @foreach($classe as $classes)
                                <option value="{{ $classes->id }}">{{ $classes->class }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
