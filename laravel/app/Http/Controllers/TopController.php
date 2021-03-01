<?php

namespace App\Http\Controllers;

class topController extends Controller
{
  public function index()
  {
    // dd($_SERVER);
    return view('top');
  }
}
