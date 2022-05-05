<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // Obtener los usuarios ques seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        // Obtener los posts de los usuarios seguidos
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(16);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
