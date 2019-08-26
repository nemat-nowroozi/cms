@extends('admin.layouts.master')

@section('scripts')
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script>
  $(document).ready(function(){
  $('#options').click(function(){
    if(this.checked){
      // console.log("it is works")
      $('.checkBox').each(function(){
      this.checked=true;
      })
    }else{
     $('.checkBox').each(function(){
    this.checked=false;
    })
      }
   
  })
})
</script>
@endsection

@section('content')

@if (Session::has('delete_photo'))
<div class="alert alert-danger">
  <div>{{Session('delete_photo')}} </div>

</div>
@endif

@if (Session::has('delete_photos'))
<div class="alert alert-danger">
  <div>{{Session('delete_photos')}} </div>

</div>
@endif



<h3>لیست فایل ها</h3>

<form action="{{route('photo.delete.all')}}" method="POST" class="form-inline">

  <div class="form-group">
    <select name="checkBoxArray" id="" class="form-control">
      <option value="delete">حذف دسته جمعی</option>
    </select>
    <input type="submit" name="submit" class="btn btn-primary" value="اعمال">
  </div>


  <table class="table table-hover bg-content" style="margin-top:10px;">
    <thead>
      <tr>
        <th><input type="checkbox" id="options"> </th>
        <th>شناسه</th>
        <th>تصویر</th>
        <th>کاربر</th>
        <th>تاریخ ایجاد</th>
        <th>عملیات</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($photos as $photo)

      <tr>
        <th><input class="checkBox" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"> </th>
        <td>{{$photo->id}}</td>
        <td><img src="{{$photo->path}}" class="img-fluid" width="80px">
        </td>
        <td>{{$photo->user->name}}</td>
        <td>{{\Hekmatinasser\Verta\Verta::instance($photo->created_at)}}</td>
        {{-- <td>{{$user->created_at}}</td> --}}

        <td>
          {!! Form::open(['method' => 'Delete' , 'action' => ['Admin\AdminPhotoController@destroy' , $photo->id] ]) !!}

          <div class="form-group">
            {!! Form::submit('حذف' , ['class' => 'btn btn-danger']) !!}

          </div>


          {!! Form::close() !!}

        </td>

      </tr>


      @endforeach


    </tbody>
  </table>
</form>
<div class="col-md-12 " style="text-align:center">{{$photos->links() }}</div>


@endsection