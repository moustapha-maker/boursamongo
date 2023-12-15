<div class="card mb-4">
  <img    src="{{asset('voiture/1638395768-png')}}" class="card-img-top"  >
  <div class="card-body">
    <h5 class="card-title">Liste de Voitures</h5>
    <p class="card-text"> tu peut avoire ici tout les information sue les voiture de nos BOURSA</p>
    <div class="row justify-content-center">
    @foreach($voitures as   $voiture) 
   
    <section class="col-md-4"> 
    <div class="card  " style="width: 17rem;">
    @if(isset($voiture['image']))
  <img style=" width :16rem ; height : 15rem;" src="{{ asset('voiture/'.$voiture['image'] ) }}" class="card-img-top"  >
    @endif
  <div class="card-body"> 
 
      <b> @if(isset($voiture["nom"]))
      {{   $voiture["nom"] }}
         @endif
         @if(isset( $voiture["date_creation"]))
       Model   {{ $voiture["date_creation"]}} <br>
       @endif
         @if(isset( $voiture["prix"]))
       prix   {{ $voiture["prix"]}} <br>
        @endif
        @if(isset($voiture['marque']))
       Marke :{{$voiture['marque']}}<br>
        @endif
        @if(isset($voiture['maillage']))
        Maillage :{{$voiture['maillage']}}<br>
        @endif
        @if(isset($voiture['type']))
      type de carburant :{{$voiture['type']}}</b><br>
        @endif
        <div class="row">
        @if(!isset($inf))
        <a href="{{ url('/clientinfo/'.$voiture['idV']) }}" class="btn btn-sm btn-info" > 
        info Client </a>
        @endif
      </td>
         <a href="{{ url('/edit/'.$voiture['idV']) }}" class="btn btn-sm btn-warning" >Edit</a> 
           <a href="{{ url('/destroy/'.$voiture['idV']) }}"class="btn btn-sm btn-danger" >Delete</a><br><br>
           <a href="{{ url('/ajoutAchat/'.$voiture['idV']) }}"class="btn btn-sm btn-success" >Acheter</a>
        </div>
       
    </div>
    </div>
    <br>
    </section>
    
    @endforeach
    </div>
  </div></div>
  
  
 
