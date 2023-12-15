<div class="card mb-4">
  <img    src="{{asset('voiture/1616245046-png')}}" class="card-img-top"  >
  <div class="card-body">
    <h5 class="card-title">Liste de Voitures</h5>
    <p class="card-text"> tu peut avoire ici tout les information sue les voiture de nos BOURSA</p>
    <div class="row justify-content-center">
    @foreach($voitures as $voiture) 
    
    <section class="col-md-4"> 
    <div class="card  " style="width: 17rem;">
  <img style=" width :16rem ; height : 15rem;" src="{{ asset('voiture/'.$voiture['image'])}}" class="card-img-top"  >
  <div class="card-body"> 
 
      <b>  id  :  {{ $voiture['idV'] }}<br>
      {{ $voiture['nom']}}
       Model   {{ $voiture['date_creation']}} <br>
       Prix  : {{ $voiture['prix'] }}<br>
       Marke :{{$voiture['marke']}}<br>
      type de carburant :{{$voiture['type']}}<br>
      telephone d'acheteur:{{$voiture['Telephone']}}</b><br>
           <a href="{{ url('/destroyvente/'.$voiture['idV']) }}"class="btn btn-sm btn-danger" >Delete</a><br><br>
        
    </div>
    </div>
    <br>
    </section>
    
    @endforeach
    </div>
  </div></div>