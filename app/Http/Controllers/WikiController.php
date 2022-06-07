<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WikiCategory;
use App\Models\WikiPage;
use Illuminate\Support\Facades\Auth;
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

        return view("wiki.wiki_home", ['categories' => WikiCategory::all()]);
    }

    public function category($slug)
    {
        if (count(WikiCategory::where('slug', $slug)->get()) == 0) {
            abort(404);
        }
        $category = WikiCategory::where('slug', $slug)->get()[0];
        $pages = WikiPage::where('category', $category['id'])->get();
        return view("wiki.wiki_category", ['pages' => $pages, 'category' => $category]);
    }

    public function page($slug)
    {

        if (count(WikiPage::where('slug', $slug)->get()) == 0) {
            abort(404);
        }
        $page = WikiPage::where('slug', $slug)->get()[0];
        return view("wiki.wiki_page", ['page' => $page]);
    }
}
