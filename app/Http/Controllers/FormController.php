<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class FormController extends Controller
{
    function index()
    {
        return view('master');
    }

    function indexLang($lang)
    {
        App::setLocale($lang);
        return view('master');
    }
}
