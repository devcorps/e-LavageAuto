<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getIndex(){
        return view('welcome');
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function getTerms(){
        return view('pages.page_terms');
    }

}