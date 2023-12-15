<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Client ;
use  App\Models\voiture ;
class ClientController extends Controller
{
     
    public  function listeClient()
    {
        $clients = Client ::all();

        return view ('voiture',['clients'=>$clients,'layout'=>'listeClient']);

    }

    public function createclient()
    {
        $clients= Client::all();

        return view('voiture',['clients'=>$clients,'layout'=>'createclient']);
    }

    public function storeclient(Request $request)
    {

        
        $client =new Client();
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');
        $client->solde=$request->input('solde');
        $client->telephone=$request->input('telephone');

        $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('client', $filename);
        $client->image=$filename;
        $client->voitures=[];
        $client->voitureVende=[];
        $client->save();
        return redirect('/createclient');
        
    }


    public function editclient($idc)
    {
        $client= Client::find($idc);
        $clients= Client::all();
        return view('voiture',['clients'=>$clients,'client'=>$client,'layout'=>'editclient']);
    }
    public function clientinfo($idc)
    {   $id=explode('-',$idc);
        $client1= Client::find($id[0]);
        $voitures =$client1->voitures ;
       
        $i=0;
        $V =[];
        foreach($voitures as $key => $voiture){  
          $voiture['idV']= $client1->_id .'-'.$key;
            $V[$i] =  $voiture  ;
            $i++;
            }
         
    
             $inf='';
        return view('voiture', ['voitures'=>$V,'client1'=>$client1,'layout'=>'clientinfo' ,'inf' => $inf]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateclient(Request $request, $idc)
    {
        $client= Client::find($idc);
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');
        $client->solde=$request->input('solde');
        $client->telephone=$request->input('telephone');
        $file = $request->file('image') ;
        $extention =$file->guessExtension();
        $filename= time().'-'.$extention;
        $request->image->move('client', $filename);
        $client->image=$filename;
        
        
        $client->save();
        return redirect('/listeClient');
    }

    public function destroyclient($idc)
    {
        $client= Client::find($idc);
        $client->delete();
        return redirect('/listeClient');  
    }

}
