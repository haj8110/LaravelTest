<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
   public function index()
   {
        return view('welcome');
   }
   public function clock()
   {
       return view('test');
   }
}
