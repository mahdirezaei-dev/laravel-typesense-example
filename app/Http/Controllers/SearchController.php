<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::search($request->get('q', ''))->options([
            'query_by' => 'title',
            'sort_by' => 'created_at:asc',
            // 'facet_by' => 'user_id',
            'filter_by' => 'user_id:[13..100]',
            // 'group_limit' => '1'
        ])->get();

        return response()->json($posts);
    }
}