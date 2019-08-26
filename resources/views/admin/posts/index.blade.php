@extends('admin.layouts.master')

@section('content')

@if (Session::has('delete_post'))
<div class="alert alert-danger">
  <div>{{Session('delete_post')}} </div>

</div>
@endif


@if (Session::has('add_post'))
<div class="alert alert-success">
  <div>{{Session('add_post')}} </div>

</div>
@endif

@if (Session::has('update_post'))
<div class="alert alert-success">
  <div>{{Session('update_post')}} </div>

</div>
@endif

<h3>لیست مطالب</h3>
<table class="table table-hover bg-content">
  <thead>
    <tr>
      <th></th>
      <th>عنوان</th>
      <th> کاربر</th>
      <th>توضیحات</th>
      <th>دسته بندی</th>
    
      <th>وضعیت</th>
      <th>تاریخ ایجاد</th>
     
      
      
    </tr>
  </thead>
  <tbody>
 
  @foreach ($posts as $post)
      
  <tr>
  <td><img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/400"}}" class="img-fluid" width="80px"></td>
  <td><a href="{{route('posts.edit' , $post->id)}}">{{$post->title}}</a></td>
  <td>{{$post->user->name}}</td>

  <td>{{str_limit($post->description , 100)}}</td>
  <td>{{$post->category->title}}</td>
  

  @if ($post->status == 0)
  <td> <span class="tag tag-pill tag-danger"> غیر فعال</span></td>
  @else
  <td> <span class="tag tag-pill tag-success"> فعال</span></td>
  @endif

  <td>{{\Hekmatinasser\Verta\Verta::instance($post->created_at)}}</td>
  {{-- <td>{{$user->created_at}}</td> --}}

</tr>
    
  
    @endforeach


  </tbody>
</table>

<div class="col-md-12 " style="text-align:center">{{$posts->links() }}</div>


@endsection