<?php

namespace App\Http\Controllers;

use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $user_id = auth()->user()->signature;

        $catLeger = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
            ->where('categorie','=','leger')->get();

        $catMoyen = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
            ->where('categorie','=','moyen')->get();

        $catLourd = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
            ->where('categorie','=','lourd')->get();

        $data = DB::Table('vehicules')
            ->join('clients','client_id','=','clients.id')
            ->select('*')->where('vehicules.user_id','=',$user_id)->get();

        return view('home')
            ->with('PoidsLourd',$catLourd)
            ->with('PoidsMoyen',$catMoyen)
            ->with('PoidsLeger',$catLeger)
            ->with('vehicules',$data);
    }

    public  function search(Request $request){
        $q = $request->input('q');
        $car = DB::table('vehicules') ->where('user_id', '=', auth()->user()->signature)
                ->where('immatriculation', 'LIKE', '%'.$q.'%')
                ->where('user_id', '=', auth()->user()->signature)
                ->orWhere('marque', 'LIKE', '%'.$q.'%')
                ->where('user_id', '=', auth()->user()->signature)
                ->orWhere('model', 'LIKE', '%'.$q.'%')
                ->where('user_id', '=', auth()->user()->signature)
                ->orWhere('categorie', 'LIKE', '%'.$q.'%')

                ->get();

        if (count($car) > 0 ) {

            $user_id = auth()->user()->signature;

            $catLeger = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
                ->where('categorie','=','leger')->get();

            $catMoyen = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
                ->where('categorie','=','moyen')->get();

            $catLourd = DB::table('lavages')->select('*')->where('user_id','=',$user_id)
                ->where('categorie','=','lourd')->get();

            return view('seacrh')
                ->with('vehis',$car)
                ->with('qre', $q)
                ->with('PoidsLourd',$catLourd)
                ->with('PoidsMoyen',$catMoyen)
                ->with('PoidsLeger',$catLeger);
        }
        else
        {
            flash()->overlay('No details found. Try to search again or create a new wash !','Not found');
            return back();
        }
    }
}
