<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->signature;
        $data = DB::Table('clients')->select('*')->where('user_id','=',$user_id)->get();
        return view('clients.index', array('clients'=>$data));
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $client = Client::find($id);
        $user_id = auth()->user()->signature;
        $cars = DB::Table('vehicules')
            ->join('passages','passages.vehicule_id', '=', 'vehicules.id')
            ->select('immatriculation', 'marque','model', DB::raw('count(*) as nombrePassage'))
            ->where('passages.user_id','=',$user_id)
            ->where('vehicules.client_id','=',$id)
            ->groupBy('immatriculation','marque','model')
            ->get();
        return view('clients.vehicules')->with('client', $client)->with('vehicules', $cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $client = Client::findOrFail($request->client_id);

        $client->update($request->all());

        flash('modification du client '.$client->nom.' reussie')->success();
        return back();
    }

    public function fideles(){

        $user_id = auth()->user()->signature;
        $data = DB::table('clients')
            ->join('vehicules', 'clients.id', '=', 'vehicules.client_id')
            ->join('passages', 'vehicules.id','=','passages.vehicule_id')
            ->select('clients.*', DB::raw('count(*) as nombrePass'))
            ->where('clients.user_id', '=', $user_id)
            ->groupBy('clients.id')
            ->orderByDesc('nombrePass')
            ->get();
        flash('Section fideles: Vous pouvez fideliser vos clients ici!')->message();
            return view('clients.fidelisation')->with('fidelistes', $data);

    }

    public function  loyal($id){
        $client = Client::findOrFail($id);
        $client->update([
                $client->fidele = true
        ]);
        flash('New!!! : '.$client->nom.' '.$client->prenoms.' est un fidele');
        return back();
    }

    public function sendBonus($id){
        $client = Client::find($id);
        $numero = $client->telephone;
        dd($numero);
    }

    public function sendEncouragement($id){
        $client = Client::find($id);
        $numero = $client->telephone;
        dd($numero);
    }
}
