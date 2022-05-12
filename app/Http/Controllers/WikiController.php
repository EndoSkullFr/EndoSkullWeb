<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WikiCategory;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

class WikiController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {

        return view("wiki_home", ['categories' => WikiCategory::all()]);
    }
}
