@extends('admin.layouts.master')

@section('content')

@if (Session::has('delete_user'))
 <div class="alert alert-danger">
  <div>{{Session('delete_user')}} </div>

</div>   
@endif


@if (Session::has('add_user'))
<div class="alert alert-success">
  <div>{{Session('add_user')}} </div>

</div>
@endif

@if (Session::has('update_user'))
<div class="alert alert-success">
  <div>{{Session('update_user')}} </div>

</div>
@endif


<h3>لیست کاربران</h3>
<table class="table table-hover bg-content">
  <thead>
    <tr>
      <th></th>
      <th>نام</th>
      <th>ایمیل</th>
      <th>نقش</th>
      <th>وضعیت</th>
      <th>تاریخ ایجاد</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($users as $user)
      <tr>
      <td><img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400"}}" class="img-fluid" width="80"> </td>
      <td><a href="{{route('users.edit' , $user->id)}} ">{{$user->name}}</a></td> 
      <td>{{$user->email}}
      </td>

      <td>
        <ul>
          @foreach ($user->roles as $role)

          <li> {{$role->name}} </li>

          @endforeach
        </ul>
      </td>


      @if ($user->status == 0)
      <td> <span class="tag tag-pill tag-danger"> غیر فعال</span></td>
      @else
      <td> <span class="tag tag-pill tag-success"> فعال</span></td>
      @endif

      <td>{{\Hekmatinasser\Verta\Verta::instance($user->created_at)}}</td>
      {{-- <td>{{$user->created_at}}</td> --}}

    </tr>
  
    @endforeach


  </tbody>
</table>

<div class="col-md-12 " style="text-align:center">{{$users->links() }}</div>


@endsection