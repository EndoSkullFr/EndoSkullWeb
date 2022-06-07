<?php

namespace App\Http\Controllers;

use App\Actions\CategoryUpdateAction;
use App\Actions\PageUpdateAction;
use App\Http\Controllers\Controller;
use App\Models\WikiCategory;
use App\Models\WikiPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view("admin.home");
    }

    public function wiki()
    {
        return view("admin.wiki.wiki");
    }

    public function wikiCategory($slug)
    {
        if (count(WikiCategory::where('slug', $slug)->get()) == 0) {
            abort(404);
        }
        $category = WikiCategory::where('slug', $slug)->get()[0];
        return view("admin.wiki.wiki_category", ['category' => $category]);
    }

    public function wikiPage($slug)
    {
        if (count(WikiPage::where('slug', $slug)->get()) == 0) {
            abort(404);
        }
        $page = WikiPage::where('slug', $slug)->get()[0];
        return view("admin.wiki.wiki_page", ['page' => $page]);
    }

    public function wikiCreatePage($categorySlug)
    {
        if (count(WikiCategory::where('slug', $categorySlug)->get()) == 0) {
            abort(404);
        }
        $category = WikiCategory::where('slug', $categorySlug)->get()[0];
        $page = WikiPage::create([
            'name' => uniqid(),
            'slug' => uniqid(),
            'category' => $category['id'],
            'content' => "Contenu d'exemple"
        ]);
        return view("admin.wiki.wiki_page", ['page' => $page]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WikiCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, WikiCategory $category, CategoryUpdateAction $categoryUpdateAction)
    {

        $categoryUpdateAction->handle($request, $category);

        return redirect()->route('wiki-editor')->with('success', 'Cette catégorie a été modifié');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WikiPage  $page
     * @return \Illuminate\Http\Response
     */
    public function updatePage(Request $request, WikiPage $page, PageUpdateAction $pageUpdateAction)
    {

        $pageUpdateAction->handle($request, $page);

        return redirect()->route('wiki-category-editor', WikiCategory::where('id', $page->category)->get()[0]['slug'])->with('success', 'Cette page a été modifié');
    }

    public function removePage(WikiPage $page) {
        $page->delete();
        return redirect()->route('wiki-category-editor', WikiCategory::where('id', $page->category)->get()[0]['slug'])->with('success', 'Cette page a été surpimée');
    }
}
