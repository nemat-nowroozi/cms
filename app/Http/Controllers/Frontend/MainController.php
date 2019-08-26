<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
  public function index()
  {
    $posts = Post::with('user', 'category', 'photo')
      ->where('status', 1)
      ->orderBy('created_at', 'desc')
      ->paginate(2);

    if (auth()->check()) {
      Session::put('login', auth()->user()->name);
    }


    $categories = Category::all();
    return view('frontend.main.index', compact(['posts', 'categories']));
  }
}
