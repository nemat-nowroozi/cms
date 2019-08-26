<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Comment;

class CommentController extends Controller
{


    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        if($post)
        {
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->post_id = $post->id;
            $comment->status = 0;
            $comment->save();

        }
        

        
        Session::flash('add_comment', 'نظر شما با موفقیت درج شد ودر انتظار تایید مدیران قرار گرفت');
        return back();
    }






    public function reply(Request $request)
    {
        // dd('test');
        $postId = $request->input('post_id');
        $parentId = $request->input('parent_id');
        
        $post = Post::findOrFail($postId);
        
        if ($post) {
            
            $comment = new Comment();
            // dd($comment);
            $comment->description = $request->input('description');
            
            $comment->parent_id = $parentId;
           
            $comment->post_id = $post->id;
            
            $comment->status = 0;
            
            $comment->save();
            // dd($comment->save());
        }



        Session::flash('add_comment', 'نظر شما با موفقیت درج شد ودر انتظار تایید مدیران قرار گرفت');
        return back();
    }



    



}
