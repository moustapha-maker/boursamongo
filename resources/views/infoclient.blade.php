<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="{{asset('client/'.$client1->image)}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">infromation du CLient</h5>
      <h6>nom : {{$client1->nom}}</h6>
      <h6>prenom : {{$client1->prenom}}</h6>
      <h6>Credi : {{$client1->solde}}</h6>
      <h6>telephone : {{$client1->telephone}}</h6>
      <br>
      <a href="{{ url('/editclient/'.$client1->id) }}" class="btn btn-sm btn-warning" >Edit</a> 
           <a href="{{ url('/destroyclient/'.$client1->id) }}"class="btn btn-sm btn-danger" >Delete</a>
    </div>
  </div>