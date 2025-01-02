<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function post_view($slug)
    {
        $post = Post::where('slug', $slug)
            ->first();
        $categories = Category::all();
        $latest_posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        $related_posts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->limit(3)->get();

        // $post = Post::with(['category', 'author.profile'])->where('slug', $slug)->firstOrFail();
        // $categories = Cache::remember('categories', 3600, fn() => Category::all());
        // $latest_posts = Cache::remember('latest_posts', 3600, fn() => Post::where('status', 'published')
        //     ->orderBy('created_at', 'desc')
        //     ->limit(4)
        //     ->get());
        // $related_posts = Post::where('category_id', $post->category_id)
        //     ->where('id', '!=', $post->id)
        //     ->limit(3)
        //     ->get();

        return view('blog.blog-post-view', compact('post', 'categories', 'latest_posts', 'related_posts'));
    }
}
