<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ReportingController extends Controller
{
    public function index(){

        $recently = $this->recently();
        $activities = $this->activiteJour();
        $categories =$this->categorieStat();
        $passage = $this->passageStat();
        $revenues = $this->revenue();
        return view('reporting')
            ->with('recently',$recently)
            ->with('activities',$activities)
            ->with('categories',$categories)
            ->with('passages',$passage)
            ->with('revenues',$revenues);
    }

    public function activiteJour(){
        $date = Date::now();
        $data = DB::table('passages')
            ->join('vehicules','vehicule_id', '=', 'vehicules.id')
            ->join('lavages','lavage_id', '=', 'lavages.id')
            ->join('clients', 'vehicules.client_id', '=', 'clients.id')
            ->select('facture', 'nom', 'prenoms', 'fidele', 'immatriculation', 'libelle')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereDate('passages.created_at', '=', $date)->get();
        return $data;
    }
    public function recently(){
        $data = DB::table('passages')
            ->join('vehicules', 'vehicule_id', '=', 'vehicules.id')
            ->join('lavages','lavage_id', '=', 'lavages.id')
            ->select( 'montant', 'libelle', 'immatriculation', 'date')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->orderBy('passages.date', 'desc')
            ->limit('5')
            ->get();
        return $data;
    }

    public function categorieStat(){
        $leger = DB::table('passages')
            ->join('lavages','lavage_id','=','lavages.id')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->where('categorie','=','leger')
            ->count();

        $moyen = DB::table('passages')
            ->join('lavages','lavage_id','=','lavages.id')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->where('categorie','=','moyen')
            ->count();

        $lourd = DB::table('passages')
            ->join('lavages','lavage_id','=','lavages.id')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->where('categorie','=','lourd')
            ->count();

        $totalCat = DB::table('passages')
            ->join('lavages','lavage_id','=','lavages.id')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->count();
        $data = ([
            'leger' => $leger,
            'moyen' => $moyen,
            'lourd' => $lourd,
            'total' => $totalCat
        ]);
        return (object)$data;
    }

    public function passageStat(){

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $daily = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->whereMonth('date','=',$month)
            ->whereDay('date','=',$day)
            ->count();

        $monthly = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->whereMonth('date','=',$month)
            ->count();

        $yearly = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->count();

        $data = ([
            'daily' => $daily,
            'monthly' => $monthly,
            'yearly' => $yearly
        ]);
        return (object)$data;
    }

    public function revenue(){

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $daily = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->whereMonth('date','=',$month)
            ->whereDay('date','=',$day)
            ->sum('montant');


        $monthly = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->whereMonth('date','=',$month)
            ->sum('montant');

        $yearly = DB::table('passages')
            ->where('passages.user_id', '=', auth()->user()->signature)
            ->whereYear('date','=',$year)
            ->sum('montant');

        $data = ([
            'daily' => $daily,
            'monthly' => $monthly,
            'yearly' => $yearly
        ]);
        return (object)$data;
    }
}
