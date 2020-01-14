<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    //Home
    public function Title(){
        return 0;
    }

    //About
    public function About(){
        return view('admin.about-admin');
    }

    public function AboutObjective(){
        return view('admin.about-objective-admin');
    }

    public function AboutBoard(){
        return view('admin.about-board-admin');
    }

    //Database
    public function Database(){
        return view('admin.database-admin');
    }

    //Scholar
    public function Scholar(){
        return view('admin.scholar-admin');
    }

    //Manuscripts
    public function Manuscripts(){
        return view('admin.manuscripts-admin');
    }

    //Vdo
    public function Vdo(){
        return view('admin.vdo-admin');
    }

    //Events
    public function Events(){
        return view('admin.events-admin');
    }

    //Shops
    public function Shops(){
        return view('admin.shops-admin');
    }

    //Contact
    public function Contact(){
        return view('admin.contact-admin');
    }
}
