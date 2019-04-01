<?php

namespace App\Http\Controllers;

use App\Lavage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LavageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->signature;
        $data = DB::Table('lavages')->select('*')->where('user_id','=',$user_id)->get();
        $grille = DB::Table('lavages')->select('*')->where('user_id','=',$user_id)->orderBy('tarif')->get();
        return view('lavage.index')->with('lavages',$data)->with('grilles',$grille);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = Lavage::create([
            'libelle' =>$request->input('libelle'),
            'categorie' =>$request->input('categorie'),
            'tarif' =>$request->input('tarif'),
            'user_id'=>auth()->user()->signature,
        ]);

        flash('New lavage type added')->success();
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $lavage = Lavage::findOrFail($request->id);

        $lavage->update($request->all());

        flash('modification reussie')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $lavage = Lavage::findOrFail($request->lavage_id);
        $lavage->delete();
        flash('suppression reussie')->success();
        return back();

    }
}
