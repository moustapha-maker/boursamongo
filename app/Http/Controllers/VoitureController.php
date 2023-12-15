<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Voiture ;
use  App\Models\Client ;
use  App\Models\vente ;
class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         

        return view('login');
    }
    public function indexx()
    {
        $clients= Client::all()->toArray();
        foreach($clients as $client){
            $voituresAll[$client['_id']] = $client['voitures'];
        
         }
         $i=0;
         $V =[];
         foreach($voituresAll as $keyclient => $voitures){
             foreach($voitures as $key => $voiture   ){
                 $voiture['idV']= $keyclient.'-'.$key;
             $V[$i] =  $voiture  ;
             $i++;
             }
              }
     
       
        return view('voiture',['voitures'=>$V,'layout'=>'index']);
    }
    public function deconnect()
    {

        session()->pull('user');
       return view('login');
       
   
    }
    public function index(Request $request )
    {
       $user =DB::table('user')->where('nom',$request->input('nom'))->where('pwsd',$request->input('pwsd'))->count();
     if($user>0){

       /* $voitures=Client::all();
        $voitures =json_encode($voitures);
       //$subset = $voitures->map->only(['voitures[]']);
        dd($voitures);
        */
        $clients= Client::all()->toArray();
        foreach($clients as $client){
            $voituresAll[$client['_id']] = $client['voitures'];
        
         }
         $i=0;
         $V =[];
         foreach($voituresAll as $keyclient => $voitures){
             foreach($voitures as $key => $voiture   ){
                 $voiture['idV']= $keyclient.'-'.$key;
             $V[$i] =  $voiture  ;
             $i++;
             }
              }
           
     
       
        return view('voiture',['voitures'=>$V,'layout'=>'index']);
    }
    else{
        echo "user name or password incorrect";
        return view('login');
    }
}

    public function indexvente()
    { 
         $clients= Client::all()->toArray();
        foreach($clients as $client){
            $voituresAll[$client['_id']] = $client['voitureVende'];
        
         }
         $i=0;
         $V =[];
         foreach($voituresAll as $keyclient => $voitures){
             foreach($voitures as $key => $voiture   ){
                 $voiture['idV']= $keyclient.'-'.$key;
             $V[$i] =  $voiture  ;
             $i++;
             }
              }
           
        return view('voiture',['voitures'=>$V,'layout'=>'indexvente']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $clients= Client::all()->toArray();
     
      
        foreach($clients as $client){
           $voituresAll[$client['_id']] = $client['voitures'];
       
        }
        $i=0;
        $V =[];
        foreach($voituresAll as $keyclient => $voitures){
            foreach($voitures as $key => $voiture   ){
                $voiture['idV']= $keyclient.'-'.$key;
            $V[$i] =  $voiture  ;
            $i++;
            }
             }
         
        $clients= Client::select('_id' , 'nom' ,'prenom')->get();
        return view('voiture',['clients'=>$clients,'voitures'=>$V,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $voitures =new Voiture();
         
        $voitures->prix=$request->input('prix');
        $voitures->marke=$request->input('marke');
        $voitures->nom=$request->input('nom');
        $voitures->date_creation=$request->input('date_creation');
        $voitures->nombre_de_km=$request->input('nombre_de_km');
        $voitures->type= $request->input('type');
         
       
       $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('voiture', $filename);
        $voitures->image=$filename;
        $ob = [
            'prix'=>$voitures->prix ,
        'marque'=>$voitures->marke,
        'date_creation'=>$voitures->date_creation,
        'nom'=> $voitures->nom,
        'maillage'=>$voitures->nombre_de_km,
        'type'=> $voitures->type,
        'image'=>  $voitures->image
    ];
         
    $client= Client::find($request->input('noProprietaire'));
       $voitures = $client->voitures ;

       $i=sizeof( $voitures);
       
       $voitures[$i]=$ob ;
       $client->voitures= $voitures;
        

    $client->save();
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiture= voiture::find($id);
        $voitures= voiture::all();
        return view('voiture',['voitures'=>$voitures,'voiture'=>$voiture,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $idv= explode('-',$id);

        $clients= Client::all()->toArray();
    
        foreach($clients as $client){
           $voituresAll[$client['_id']] = $client['voitures'];
       
        }
        $i=0;
        $V =[];
        $voitedit =[];
        foreach($voituresAll as $keyclient =>  $voitures){
             
            foreach($voitures as $key => $Voiture   ){
                if($keyclient==$idv[0]){
                   
                    if($key==$idv[1]){
                        $voitedit=$Voiture ;
                        $voitedit['idV']= $client['_id'].'-'.$key;
                    } 
                }
                $Voiture['idV']= $client['_id'].'-'.$key;
            $V[$i] =  $Voiture  ;
            $i++;
            }
             }
       /**    $clients =client ::all();*/
        return view('voiture',['voitures'=>$V,'voiture'=>$voitedit,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $idv = explode('-',$id);
        $voitures =new Voiture();
         
        $voitures->prix=$request->input('prix');
        $voitures->marke=$request->input('marke');
        $voitures->nom=$request->input('nom');
        $voitures->date_creation=$request->input('date_creation');
        $voitures->nombre_de_km=$request->input('nombre_de_km');
        $voitures->type= $request->input('type');
         
       
       $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('voiture', $filename);
        $voitures->image=$filename;
        $nV = [
            'prix'=>$voitures->prix ,
        'marque'=>$voitures->marke,
        'date_creation'=>$voitures->date_creation,
        'nom'=> $voitures->nom,
        'maillage'=>$voitures->nombre_de_km,
        'type'=> $voitures->type,
        'image'=>  $voitures->image
    ];
       

    $client= Client::find($idv[0]);
  /*  dd(  $client);*/
    
       
         $voitures = $client->voitures ;
         $voitures[$idv[1]]=$nV;
         $client->voitures =$voitures;
         $client->save();
       
        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $idv = explode('-',$id);
        $client= Client::find($idv[0]);
        $voitures = $client->voitures ;
        unset($voitures[$idv[1]]);
        $client->voitures =  $voitures ;
        $client->save();
      
        return redirect('/index');  
    }
    public function destroyvente($id)
    {
        $idv = explode('-',$id);
        $client= Client::find($idv[0]);
        $voitures = $client->voitureVende ;
        unset($voitures[$idv[1]]);
        $client->voitureVende =  $voitures ;
        $client->save();
        return redirect('/indexvente');  
    }
    
    public  function ajoutAchat($id)
    {   $idv=explode('-',$id);
        
        $clients= Client::all()->toArray();
    
        foreach($clients as $client){
           $voituresAll[$client['_id']] = $client['voitures'];
       
        }
        $i=0;
        $V =[];
        $voiteAchet =[];
        foreach($voituresAll as $keyclient =>  $voitures){
             
            foreach($voitures as $key => $Voiture   ){
                if($keyclient==$idv[0]){
                    if($key==$idv[1]){
                        $voiteAchet=$Voiture ;
                        $voiteAchet['idV']= $id;
                    } 
                }
                $Voiture['idV']= $client['_id'].'-'.$key;
            $V[$i] =  $Voiture  ;
            $i++;
            }
             }
        return view('voiture',['voitures'=>$V,'voiture'=>$voiteAchet,'layout'=>'ajoutAchat']);
    }
     public  function validerAchat(Request $request,$id)
     {  

        $vente =new vente();
        $vente->image=$request->input('image');
        $vente->prix=$request->input('prix');
        $vente->marke=$request->input('marke');
        $vente->nom=$request->input('nom');
        $vente->date_creation=$request->input('date_creation');
        $vente->type= $request->input('type');
        $vente->Telephone = $request->input('Telephone');
        
        
        
        $idv= explode('-',$id) ;
        $client = client::find($idv[0]);
        
        $voitures = $client->voitures ;
        unset($voitures[$idv[1]]);
        $client->voitures =  $voitures ;
         
        $voituresven = $client->voitureVende ;
        $i = sizeof($voituresven);
        $voituresven[$i]=$vente->toArray();
        $client->voitureVende =  $voituresven ;

        $client->save();
        if($client->nom=="admin"){
        $cr = $client->solde + $request->input('prix');
        $client->solde=$cr ;
        $client->save();
        }
        else
        {
             
            $cr = $client->solde + $request->input('prix')*0.9;
            $client->solde=$cr ;
            $client->save();

          $client = client::find('61b4f11f751500006d0039f7');
          
           $cr = $client->solde + $request->input('prix')*0.1;
           $client->solde=$cr ;
           $client->save();

        }
      

        return redirect('/index');  
        
     }


   

}
