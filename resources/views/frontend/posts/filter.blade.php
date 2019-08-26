@extends('frontend.layouts.master')

@section('head')
<meta name="description" content="وبلاگ روکسو">
<meta name="keywords" content="آموزش ساخت وبلاگ , آموزش لاراول">
@endsection

@section('navigation')
@include('partials.navigation' ,['categories' => $categories] )
@endsection

@section('content')
<h5 class="mt-4">آخرین مطلب</h5>



@foreach ($posts as $post)


<!-- Title -->
<h1 class="mt-4"><a href="{{route('frontend.posts.show' , $post->slug)}}">{{$post->title}} </a></h1>

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
<div>{{str_limit($post->description , 200)}}</div>
<div class="col-md-12 text-right">
    <a href="{{route('frontend.posts.show' , $post->slug)}}" class="btn btn-primary"> ادامه مطلب</a>
</div>
<hr>


@endforeach

{{-- <div class="col-md-12 " style="text-align:center">{{$posts->links() }}</div> --}}

@endsection

@section('sidebar')
@include('partials.sidebar' ,['categories' => $categories] )
@endsection