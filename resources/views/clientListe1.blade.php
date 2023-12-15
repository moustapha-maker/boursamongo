<div class="card mb-4">
 <div class="card-body">
    <h5 class="card-title">Liste de Clients</h5>
    <p class="card-text"> tu peut avoire ici tout les information sue les Client de la BOURSA</p>
    <div class="row justify-content-center">
 @foreach($clients as $client)
      
 <section class="col-md-4"> 
    <div class="card  " style="width: 17rem;">
  <img style=" width :16rem ; height : 15rem;" src="{{ asset('client/'.$client->image)}}" class="card-img-top"  >
  <div class="card-body"> 
    <b>ID  :{{ $client->id }}<br>
       NOM  :{{$client->nom}} <br>
       SOLDE :{{$client->solde}}<br>
       PRENOM :{{ $client->prenom}}<br>
       TELPHONE :{{$client->telephone}}<br>
       DATE_CREATION :{{ $client->created_at}}<br>
 
         <a href="{{ url('/editclient/'.$client->id) }}" class="btn btn-sm btn-warning" >Edit</a> 
         <a href="{{ url('/destroyclient/'.$client->id) }}"class="btn btn-sm btn-danger" >Delete</a>
   </div>
   </div>
 </section>
 
    @endforeach
 
</div>
</div>
  
  
 
