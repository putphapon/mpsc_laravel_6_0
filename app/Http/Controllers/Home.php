<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    //Home
    public function Home()
    {
        $title = DB::table('title')->orderBy('created_at', 'desc')->get();
        $database = DB::table('database')->get();

        $scholar_category = DB::table('scholar_category')->get();
        $scholar_blog = DB::table('scholar_blog')->orderBy('created_at', 'desc')->get();
        
        $manuscripts_category = DB::table('manuscripts_category')->get();
        $manuscripts_blog = DB::table('manuscripts_blog')->orderBy('created_at', 'desc')->get();
        
        $vdo = DB::table('vdo')->get();
        $events = DB::table('events')->orderBy('events_date', 'desc')->get();
        $shops = DB::table('shops')->orderBy('created_at', 'desc')->get();




        return view('index.home', 
            [   'title' => $title ,
                'database' => $database,
                'scholar_category' => $scholar_category,
                'scholar_blog' => $scholar_blog,
                'manuscripts_category' => $manuscripts_category,
                'manuscripts_blog' => $manuscripts_blog,
                'vdo' => $vdo,
                'events' => $events,
                'shops' => $shops
            ]
        );
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
