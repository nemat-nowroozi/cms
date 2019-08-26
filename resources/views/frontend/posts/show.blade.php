@extends('frontend.layouts.master')

@section('head')
<meta name="description" content="{{$post->meta_description}}">
<meta name="keywords" content="{{$post->meta_keywords}}">
<script src="{{ asset('/js/jquery.min.js') }}"></script>
@endsection

@section('navigation')
@include('partials.navigation' ,['categories' => $categories] )
@endsection

@section('content')

@if (Session::has('add_comment'))
<div class="alert alert-success mt-2">
    <div>{{Session('add_comment')}} </div>

</div>
@endif

<!-- Title -->
<h1 class="mt-4">{{$post->title}}</h1>

<!-- Author -->
<p class="lead"> ایجاد شده توسط <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>منتشر شده در تاریخ <td>{{\Hekmatinasser\Verta\Verta::instance($post->created_at)}}</td>
</p>

<hr>

<!-- Preview Image -->
<td><img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/900x300"}}" class="img-fluid rounded"></td>

<hr>

<!-- Post Content -->
<div>{{$post->description}}</div>
<hr>

<!-- Comments Form -->
 @include('partials.form-errors')

<div class="card my-4">
    <h5 class="card-header">ثبت نظر</h5> 
    <div class="card-body">

       
        {!! Form::open(['method' => 'POST','route' => ['frontend.comments.store' , $post->id]]) !!}


        <div class="form-group">
            {!! Form::label('description' , 'توضیحات:') !!}
            {!! Form::textarea('description' , null , ['class' => 'form-control']) !!}
        </div>

    </div>

    <div class="form-group">
        {!! Form::submit('ذخیره' , ['class' => 'btn btn-success']) !!}

    </div>

    {!! Form::close() !!} 
  
</div>


<!-- Single Comment -->

@include('partials.comments' , ['comments' => $post->comments , 'post' => $post  ])



@endsection

@section('sidebar') 
@include('partials.sidebar' ,['categories' => $categories] )
 @endsection