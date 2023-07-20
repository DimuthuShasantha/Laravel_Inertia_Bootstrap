<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends ParentController
{
  public function index ()
  {
    return Inertia::render('Pages/Home/Index');
  }
}
