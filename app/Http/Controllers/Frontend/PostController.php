<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{

  public function show($slug)
  {

    $post = Post::with([
      'user', 'category', 'photo',
      'comments' => function ($q) {
        $q->where('status', 1)->where('parent_id', null);
      }, 'comments.replies' => function ($q) { //minut 35 video 60 //khodesh ezafesh kard ama man to video nadidam
        $q->where('status', 1);
      }
    ])
      ->where('slug', $slug)
      ->where('status', 1)
      ->first();
    $categories = Category::all();
    return view('frontend.posts.show', compact(['post', 'categories']));
  }





  public function postFilter($id)
  {
    //  dd(auth()->id());
    $categories = Category::all();
    if (auth()->check()) {
      $posts = Post::with('category')->where('category_id', $id)->get();
      return view('frontend.posts.filter', compact(['posts', 'categories']));
    } else {
      return redirect()->route('cms.showlogin');
    }
    //  dd($posts);

  }





  public function searchTitle()
  {
    $query = Input::get('title');
    // dd($query);
    $posts = Post::with('user', 'category', 'photo')
      ->where('title', 'LIKE', "%" . $query . "%")
      ->orwhere('description', 'LIKE', "%" . $query . "%")
      ->where('status', 1)
      ->orderBy('created_at', 'DESC')
      ->paginate(3);
    $categories = Category::all();
    return view('frontend.posts.search', compact(['posts', 'categories', 'query']));
  }
}
