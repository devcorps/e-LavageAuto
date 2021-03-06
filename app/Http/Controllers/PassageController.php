<?php

namespace App\Http\Controllers;

use App\Client;
use App\Lavage;
use App\Passage;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $passage = new Passage();
        $passage->date = date('Y-m-d');
        $passage->facture = $this->generateRandomString(7);
        $passage->vehicule_id = $request->input('vehicule_id');
        $passage->lavage_id = $request->input('lav_id');
        $passage->user_id = auth()->user()->signature;
        $passage->montant = $request->input('tarif');
        $passage->heureArrive = $request->input('arrive');
        $passage->heureDepart = $request->input('depart');
        $passage->save();

        $vehicule = Vehicule::find($request->input('vehicule_id'));
        $client = Client::find($vehicule->client_id);

        flash('Le passage a été enregistrement')->success();
        return view('passage.notif')->with('client', $client)->with('vehicule',$vehicule);
    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function addPass(Request $request){
        $vehicule = Vehicule::find($request->input('vehicule_id'));
        $client = $vehicule->clients;

        $lavage = Lavage::find($request->input('code'));

        $data = ([
            'enter' => $request->input('arrive'),
            'sortie' => $request->input('depart'),
            'mode' => $request->input('r3'),
        ]);
        $passage = (object) $data;
        return view('passage.recu')
            ->with('client',$client)
            ->with('lavage',$lavage)
            ->with('passage',$passage)
            ->with('vehicule',$vehicule);
    }

    public function newPass(Request $request){

        global $clt_id;

        $permis = $request->input('permis');
        $mandataire = Client::where('permis', $permis)->where('user_id', '=', auth()->user()->signature)->get();

        foreach ($mandataire as $clt){
            $clt_id = $clt->id;
            };
        if (isset($clt_id)){
            $client = Client::find($clt_id);
            $vehicule = $client->vehicules()->create([
                'immatriculation' => $request->input('immatriculation'),
                'marque' => $request->input('marque'),
                'model' => $request->input('model'),
                'categorie' => $request->input('categorie'),
                'nombrePassage' => 1,
                'user_id' => auth()->user()->signature
            ]);

        }
        else {
            $client = new Client();

            $client->nom = $request->input('nom');
            $client->prenoms = $request->input('prenoms');
            $client->permis = $request->input('permis');
            $client->telephone = $request->input('tel');
            $client->commune = $request->input('commune');
            $client->user_id = auth()->user()->signature;

            $client->save();

            $vehicule =$client->vehicules()->create([
                'immatriculation' => $request->input('immatriculation'),
                'marque' => $request->input('marque'),
                'model' => $request->input('model'),
                'categorie' => $request->input('categorie'),
                'nombrePassage' => 1,
                'user_id' => auth()->user()->signature
            ]);
        }
        $lavage = Lavage::find($request->input('code'));

        $data = ([
            'enter' => $request->input('arrive'),
            'sortie' => $request->input('depart'),
            'mode' => $request->input('r3'),
        ]);
        $passage = (object) $data;
        return view('passage.recu')
            ->with('client',$client)
            ->with('lavage',$lavage)
            ->with('passage',$passage)
            ->with('vehicule',$vehicule);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passage  $passage
     * @return \Illuminate\Http\Response
     */
    public function show(Passage $passage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passage  $passage
     * @return \Illuminate\Http\Response
     */
    public function edit(Passage $passage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passage  $passage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passage $passage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passage  $passage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passage $passage)
    {
        //
    }

}
