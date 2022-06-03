<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WikiCategory;
use App\Models\WikiPage;
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

    public function category($category)
    {

        $pages = WikiPage::where('category', $category)->get();
        if (count(WikiCategory::where('slug', $category)->get()) == 0) {
            abort(404);
        }
        $category = WikiCategory::where('slug', $category)->get()[0];
        return view("wiki_category", ['pages' => $pages, 'category' => $category]);
    }

    public function page($category, $page)
    {

        if (count(WikiPage::where('category', $category)->where('slug', $page)->get()) == 0) {
            abort(404);
        }
        $page = WikiPage::where('category', $category)->get()[0];
        return view("wiki_page", ['page' => $page, 'category' => $category]);
    }
}
