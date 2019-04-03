<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportingController extends Controller
{

    public function index(){
        $user_id = Auth::user()->signature;
        //variable contenants les mois
        $janvier = date("m",strtotime("2019-01-01"));
        $fevrier = date("m",strtotime("2019-02-01"));
        $mars= date("m",strtotime("2019-03-01"));
        $avril = date("m",strtotime("2019-04-01"));
        $mai= date("m",strtotime("2019-05-01"));
        $juin= date("m",strtotime("2019-06-01"));
        $juillet = date("m",strtotime("2019-07-01"));
        $aout = date("m",strtotime("2019-08-01"));
        $septembre = date("m",strtotime("2019-09-01"));
        $octobre = date("m",strtotime("2019-10-01"));
        $novembre = date("m",strtotime("2019-11-01"));
        $decembre = date("m",strtotime("2019-12-01"));

        //données graphe
        $jan = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$janvier)
            ->count('nombrePassage');
        $fev = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$fevrier)
            ->count('nombrePassage');
        $mar = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$mars)
            ->count('nombrePassage');
        $avr = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$avril)
            ->count('nombrePassage');
        $may = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$mai)
            ->count('nombrePassage');
        $jun = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$juin)
            ->count('nombrePassage');
        $jully = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$juillet)
            ->count('nombrePassage');
        $agust = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$aout)
            ->count('nombrePassage');
        $september = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$septembre)
            ->count('nombrePassage');
        $october = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$octobre)
            ->count('nombrePassage');
        $november = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$novembre)
            ->count('nombrePassage');
        $december = DB::Table('vehicules')->select('*')
            ->where('user_id','=',$user_id)
            ->whereMonth('created_at',"=",$decembre)
            ->count('nombrePassage');

        //données reporting

        $passage = DB::Table('vehicules')->select('*')->where('user_id','=',$user_id)
            ->count('nombrePassage');
        $vehicule = DB::Table('vehicules')->select('*')->where('user_id','=',$user_id)->count('marque');
        $client = DB::Table('clients')->select('*')->where('user_id','=',$user_id)->count();
        $fidele = DB::Table('clients')->select('*')
            ->where('user_id','=',$user_id)->
            where('fidele','=','1')->count();
        //dd($date);
        return view('reporting')
                    ->with('passage',$passage)
                    ->with('vehicule',$vehicule)
                    ->with('client',$client)
                    ->with('fidele',$fidele)
                    ->with('janvier',$jan)
                    ->with('fevrier',$fev)
                    ->with('mars',$mar)
                    ->with('avril',$avr)
                    ->with('mai',$may)
                    ->with('juin',$jun)
                    ->with('juillet',$jully)
                    ->with('aout',$agust)
                    ->with('septembre',$september)
                    ->with('octobre',$october)
                    ->with('novembre',$november)
                    ->with('decembre',$december);

    }
}
