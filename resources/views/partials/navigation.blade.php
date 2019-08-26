
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

    
{{-- <a class="navbar-brand" href="#"></a> --}}
@if (session('login'))
   <li class="dropdown user user-menu">
    <a style="color:#cddc39" href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">{{session('login')}} خوش آمدید</span>
    </a>
    <ul class="dropdown-menu"> 
        <li class="user-footer"> 
            <div class="pull-left">
                <a style="color:#cddc39" href="{{route('cms.logout')}}" class="btn btn-default btn-flat">خروج</a>
            </div>
        </li>
    </ul>
</li>

@else

  <a style="color:#cddc39" href="{{route('cms.showlogin')}}" class="btn btn-default btn-flat">ورود</a> 
  <a style="color:#cddc39" href="{{route('cms.showregister')}}" class="btn btn-default btn-flat">ثبت نام</a>
 
@endif
 


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              {{-- @foreach ($categories as $category)
                  <li class="nav-item">
                      {{-- @auth --}}
                        {{-- <a class="nav-link" href="{{route('frontend.posts.filter',[$category->id])}}">{{$category->title}}</a>   --}}
                      {{-- @endauth --}}
                      
                  {{-- </li> --}}
              {{-- @endforeach   --}} --}}
            </ul>
        </div>
    </div>
</nav>