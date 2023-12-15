<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sccs/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('sccs/Style.css')}}">

</head>
<body>
 
 
@include("Navbar")

 
  <div class="row header-container justify-content-center">
     <div class="header">
     <h1>GESTION DE BOURSA</h1>
     </div>
     </div>
   

   

     @if($layout == 'indexvente')
    <div class="container-fluid mt-4 ">
     <div class="row justify-content-center">
        <section class="col-md-8">
           @include("ListeVente")
        </section>
        <section class="col-md-3">
      
        
        </section>
    </div>
    </div>
    @elseif($layout == 'index')
    <div class="container-fluid mt-4 ">
     <div class="row justify-content-center">
        <section class="col-md-8">
           @include("voitureListe1")
        </section>
        <section class="col-md-3">
      
        
        </section>
    </div>
    </div>
    @elseif($layout == 'create')
    <div class="container-fluid mt-4">
      <div class="row justify-content-center"> 
      <section class="col-md-8" >
           @include("voitureListe1")
        </section>
          <section class="col-md-3">
          <div class="card mb-4">
          <div class="card-body">
   <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
     @csrf 
              <div class="form-group">
              <label >Prix</label>
            <input type="text" name="prix" class="form-control"   placeholder="Enter prix" >

            <label >Marke</label>
            <input type="text" name="marke" class="form-control"   placeholder="Enter Marke" >

            <label >nom</label>
            <input type="text" name="nom" class="form-control"   placeholder="Enter nom">

            <label >date_creation</label>
            <input type="text" name="date_creation" class="form-control"   placeholder="Enter date_creation">

            <label >nombre_de_km</label>
            <input type="text" name="nombre_de_km" class="form-control"   placeholder="Enter nombre_de_km">

            <label >type</label>
            <input type="text" name="type" class="form-control"   placeholder="Enter type">

            <label >noProprietaire</label>
     
             <select name="noProprietaire" id=""  class="form-control" placeholder="Enter noProprietaire">
             @foreach($clients as $client)
             <option value="{{$client->id}}">{{$client->nom }}  {{$client->prenom }}</option>
             @endforeach
             </select>
           
          <label >Url Image</label>

              <div class="custom-file">
              <input type="file" class="custom-file-input"   name="image" id="validatedCustomFile" required>
              <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              <div class="invalid-feedback">Example invalid custom file  </div>

          </div></div>
            <input type="submit" class="btn btn-info" value="Save">
            <input type="reset" class="btn btn-warning" value="Reset">
            
          </form> 
    </div></div>
         </section>   
    </div>
  </div>
    @elseif($layout == 'show')
    <div class="container-fluid mt-4">
    <div class="row">
          <section class="col-md-8">
            @include("voitureListe1")
          </section>
          <section class="col-md-4"></section>
    </div>
    </div>
    @elseif($layout == 'edit')
    <div class="container-fluid mt-4">
      <div class="row justify-content-center"> 
      <section class="col-md-8" >
           @include("voitureListe1")
        </section>
          <section class="col-md-3"  >
          <div class="card mb-4">
          <div class="card-body">
          <form action="{{ url('/update/'.$voiture['idV'])}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"  >
          <label >Prix</label>
            <input type="text" value="{{  $voiture['prix']}}" name="prix" class="form-control"   placeholder="Enter prix" >
            <label >Marke</label>
            <input type="text" value="{{  $voiture['marque']}}" name="marke" class="form-control"   placeholder="Enter Marke">

            <label >nom</label>
            <input type="text" value="{{  $voiture['nom'] }}" name="nom" class="form-control"   placeholder="Enter nom">

            <label >date_creation</label>
            <input type="text" name="date_creation" value="{{  $voiture['date_creation'] }}" class="form-control"   placeholder="Enter date_creation">

            <label >nombre_de_km</label>
            <input type="text" name="nombre_de_km" value="{{  $voiture['maillage'] }}" class="form-control"   placeholder="Enter nombre_de_km">

            <label >type</label>
            <input type="text" name="type" value="{{  $voiture['type'] }}" class="form-control"   placeholder="Enter type">
            
            <label >Url Image</label>

              <div class="custom-file">
              <input type="file" class="custom-file-input"   name="image" id="validatedCustomFile"  >
              <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              <div class="invalid-feedback">Example invalid custom file  </div>
   
          <div>
            <input type="submit" class="btn btn-info" value="Update">
            <input type="reset" class="btn btn-warning" value="Reset">
            
          </form> </div></div>
          </section>
    </div>
    </div>
    @elseif($layout == 'listeClient')
    <div class="container-fluid mt-4 ">
     <div class="row justify-content-center">
        <section class="col-md-8">
           @include("clientListe1")
        </section>
        <section class="col-md-4">
      
        
        </section>
    </div>
    </div>

    @elseif($layout == 'createclient')
    <div class="container-fluid mt-4">
      <div class="row justify-content-center"> 
      <section class="col-md-7" >
           @include("clientListe1")
        </section>
          <section class="col-md-3">
          <div class="card  " style="width: 22rem;">
          <div class="card-body">
   <form action="{{ url('/storeclient') }}" method="post" enctype="multipart/form-data">
     @csrf 
              <div class="form-group">
            <label >nom</label>
            <input type="text" name="nom" class="form-control"   placeholder="Enter nom" >

            <label >prenom</label>
            <input type="text" name="prenom" class="form-control"   placeholder="Enter prenom">

            <label >Solde</label>
            <input type="text" name="solde" class="form-control"   placeholder="Enter solde">
            <label >telephone</label>
            <input type="text" name="telephone" class="form-control"   placeholder="Enter numero de telephone">


            <label >Url Image</label>
       

            <div class="custom-file">
            <input type="file" class="custom-file-input"   name="image" id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div> </div>
            <input type="submit" class="btn btn-info" value="Save">
            <input type="reset" class="btn btn-warning" value="Reset">
           
          </form> 
</div></div>
         </section>   
    </div>
  </div>

  @elseif($layout == 'editclient')
    <div class="container-fluid mt-4">
     <div class="row">
          <section class="col-md-7" >
            @include("clientListe1")
          </section> 
          <section class="col-md-4"  >
          <div class="card  " style="width: 22rem;">
          <div class="card-body">
          <form action="{{ url('/updateclient/'.$client->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"  >
            <label >nom</label>
            <input type="text" value="{{  $client->nom }}" name="nom" class="form-control"   placeholder="Enter Marke">

            <label >prenom</label>
            <input type="text" value="{{  $client->prenom }}" name="prenom" class="form-control"   placeholder="Enter nom">
           
            <label >Solde</label>
            <input type="text" value="{{  $client->solde }}" name="solde" class="form-control"   placeholder="Enter solde">

            <label >telephone</label>
            <input type="text" name="telephone" value="{{  $client->telephone }}" class="form-control"   placeholder="Enter nombre_de_km">
            <label >Url Image</label>

            <div class="custom-file">
    <input type="file" class="custom-file-input"  value="{{  $client->image }}" name="image" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
     </div>
            </div>
            <input type="submit" class="btn btn-info" value="Update">
            <input type="reset" class="btn btn-warning" value="Reset">
            
          </form> 
</div></div>
          </section>
    </div>
    </div>
    
    @elseif($layout == 'clientinfo')
    <div class="container-fluid mt-4">
     <div class="row">
          <section class="col-md-9" >
            @include("voitureListe1")
          </section> 
          <section class="col-md-3  "  >
          @include("infoclient")
          </section>
    </div>
    </div>
   @elseif($layout == 'ajoutAchat')
    <div class="container-fluid mt-4">
      <div class="row justify-content-center"> 
      <section class="col-md-8" >
           @include("voitureListe1" )
        </section>
          <section class="col-md-3"  >
          <div class="card mb-4">
          <div class="card-body">
          <form action="{{ url('/validerAchat/'.$voiture['idV'])}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"  >
          <label >Prix</label>
            <input type="text" value="{{  $voiture['prix'] }}" name="prix" class="form-control"     placeholder="Enter prix" >
            <label >Marke</label>
            <input type="text" value="{{  $voiture['marque']}}" name="marke" class="form-control"     placeholder="Enter Marke">

            <label >nom</label>
            <input type="text" value="{{  $voiture['nom'] }}" name="nom" class="form-control"     placeholder="Enter nom">

            <label >date_creation</label>
            <input type="text" name="date_creation" value="{{  $voiture['date_creation'] }}"   class="form-control"   placeholder="Enter date_creation">
            <input type="hidden" name="image" value="{{  $voiture['image'] }}"   class="form-control"   placeholder="Enter date_creation">

            
            <label >type</label>
            <input type="text" name="type" value="{{  $voiture['type'] }}" class="form-control"     placeholder="Enter type">
            
             <label >Telephone d'achateur</label>
             <input type="text" name="Telephone"   class="form-control"   placeholder="Enter num">
       
        
        <div>
            <input type="submit" class="btn btn-info" value="Confirmez lachat">
            <input type="reset" class="btn btn-warning" value="Reset">
            
          </form> </div></div>
          </section>
    </div>
    </div>
    @endif
<footer>
  
</footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{asset('js/jquery-3.5.1.min.js')}}"   ></script>
<script src="{{asset('js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
