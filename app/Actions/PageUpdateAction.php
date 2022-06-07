<?php

namespace App\Actions;

use App\Models\WikiCategory;
use App\Models\WikiPage;
use Illuminate\Http\Request;

class PageUpdateAction
{
    public function handle(Request $request, WikiPage $post): void
    {
        $updateArray = [
            'name' => $request->name,
            'category' => $request->category,
            'slug' => $request->slug,
            'content' => $request->description
        ];

        $post->update($updateArray);
    }
}
