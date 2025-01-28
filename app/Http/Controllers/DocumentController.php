<?php

/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Document Controller 
Description: Core document management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
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
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $param['pageName'] = "Document Dashboard";
        return view('documents.index', $param);
    }

    public function one()
    {
        $param['pageName'] = "One Document";
        return view('documents.one', $param);
    }

    public function domains()
    {
        $param['pageName'] = "Domains";
        return view('structures.domains.domains', $param);
    }

    public function workgroups()
    {
        $param['pageName'] = "Workgroups";
        return view('structures.workgroups', $param);
    }

}
