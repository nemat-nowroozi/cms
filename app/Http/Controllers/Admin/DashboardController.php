<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Photo;
use App\User;

class DashboardController extends Controller
{
   
    public function index()
    {
        $postsCount = Post::count(); 
        $categoriesCount = Category::count();
        $photosCount = Photo::count();
        $usersCount = User::count();
        $posts = Post::orderBy('created_at' , 'DESC')->limit(5)->get();
        $users = User::orderBy('created_at' , 'DESC')->limit(5)->get();

        return view('admin.dashboard.index' , compact(['postsCount' , 'categoriesCount' , 'photosCount' , 'usersCount' , 'posts' , 'users']));
            
    }

 


}
