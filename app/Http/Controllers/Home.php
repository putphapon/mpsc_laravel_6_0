<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Home extends Controller
{
    //Home
    public function Home()
    {
        $title = DB::table('admin_titles')->get();
        //$database = DB::table('admin_database')->get();

        return view('index.home', [
                                'title' => $title
                                ]);
    }
 
    //About
    public function About()
    {
        return view('index.about');
    }

    public function AboutObjective()
    {
        return view('index.about-objective');
    }

    public function AboutBoard()
    {
        return view('index.about-board');
    }

    //Database
    public function Database()
    {
        return view('index.database');
    }

    //Scholar
    public function Scholar()
    {
        return view('index.scholar');
    }

    //Manuscripts
    public function Manuscripts()
    {
        return view('index.manuscripts');
    }
    
    public function ManuscriptsTag()
    {
        return view('index.manuscripts-tag');
    }

    public function ManuscriptsContent()
    {
        return view('index.manuscripts-content');
    }

    //Vdo
    public function Vdo()
    {
        return view('index.vdo');
    }

    //Events
    public function Events()
    {
        return view('index.events');
    }

    //Shops
    public function Shops()
    {
        return view('index.shops');
    }

    //Contact
    public function Contact()
    {
        return view('index.contact');
    }

}
