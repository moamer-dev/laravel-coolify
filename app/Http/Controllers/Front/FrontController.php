<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PathUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\LearningPath;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\TechnologyStack;

class FrontController extends Controller
{
    private $user;

    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }

    public function home(): View
    {
        $paths = LearningPath::with(['learningStacks.technologyStacks'])->where('is_active', 1)->get();
        $posts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('/front/landing', compact('paths', 'posts'));
    }

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

        return view('blog.blog-post-view', compact('post', 'categories', 'latest_posts', 'related_posts'));
    }

    public function front_view($slug)
    {
        $path = LearningPath::where('slug', $slug)->first()->load('learningStacks.technologyStacks');
        //dd($path);
        return view('front.front-path-view', compact('path'));
    }

    public function technology_view($slug)
    {
        $technology = TechnologyStack::where('slug', $slug)
            ->with(['courses.projects', 'quizzes', 'series'])
            ->first();
        return view('front.front-technology-view', compact('technology'));
    }
}
