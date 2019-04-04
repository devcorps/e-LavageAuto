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
        $report = $this->recap();
        $stats = $this->dataStation();

        return view('reporting')
            ->with('recently',$recently)
            ->with('activities',$activities)
            ->with('categories',$categories)
            ->with('passages',$passage)
            ->with('revenues',$revenues)
            ->with('recap',$report)
            ->with('stats',$stats);
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

    public  function recap(){
        $user_id = auth()->user()->signature;
        $year = date('Y');

        $jan = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",1)
            ->count();

        $fev = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",2)
            ->count();

        $mar = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",3)
            ->count();

        $avr = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('created_at',"=",4)
            ->count();

        $may = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",5)
            ->count();

        $jun = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",6)
            ->count();

        $jully = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",7)
            ->count();

        $agust = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",8)
            ->count();

        $september = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",9)
            ->count();

        $october = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",10)
            ->count();

        $november = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",11)
            ->count();

        $december = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->whereYear('date','=',$year)
            ->whereMonth('date',"=",12)
            ->count();
        $data =([
            'jan' => $jan,
            'fev' => $fev,
            'mar' => $mar,
            'avr' => $avr,
            'mai' => $may,
            'jui' => $jun,
            'jul' => $jully,
            'aou' => $agust,
            'sep' => $september,
            'oct' => $october,
            'nov' => $november,
            'dec' => $december,
            'year' => $year
        ]);

        return (object)$data;
    }

    public function dataStation(){
        $user_id = auth()->user()->signature;

        $passage = DB::Table('passages')
            ->where('user_id','=',$user_id)
            ->count();

        $vehicule = DB::Table('vehicules')
            ->where('user_id','=',$user_id)
            ->count();

        $client = DB::Table('clients')
            ->where('user_id','=',$user_id)
            ->count();

        $fidele = DB::Table('clients')
            ->where('user_id','=',$user_id)
            ->where('fidele','=',1)
            ->count();

        $data = ([
            'wash' => $passage,
            'car' => $vehicule,
            'client' => $client,
            'loyal' => $fidele
        ]);

        return (object)$data;
    }

}
