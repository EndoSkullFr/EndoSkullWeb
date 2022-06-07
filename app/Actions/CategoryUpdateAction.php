<?php

namespace App\Actions;

use App\Models\WikiCategory;
use Illuminate\Http\Request;

class CategoryUpdateAction
{
    public function handle(Request $request, WikiCategory $post): void
    {
        $updateArray = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug
        ];

        $post->update($updateArray);
    }
}
