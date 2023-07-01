@extends('layouts.auth-master')

<style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
height: 100vh;
}

body.text-center {
    position: relative;
      background-image: url('/assets/images/video_homebanner.png');
      background-repeat: no-repeat;
      background-position-y: center;
      background-position-x: center;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      z-index: 0;
}

.logo{
    max-width: 100px;
    position: absolute;
    top:10px;
    right:10px;
}

body.text-center::before{
    display: block;
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          z-index: -1;
          background-color: rgba(0, 0, 0, 0.15);
          padding: 0;
          width: 100%;
          content: '';
}
    main.form-signin {
    min-width: 500px;
    align-items: center;
    background: rgba(255,255,255,0.3);
    padding: 20px;
    border-radius:20px;
    /* background: #71bbd9; */
}

@media screen and (max-width : 992px){
    body.text-center {
    position: relative;
      background-image: url('/assets/images/home/background.png');

}

}


@media screen and (max-width: 540px) {   
     main.form-signin {
    min-width: 300px;
}
}

@media screen and (max-width: 300px) {   
     main.form-signin {
    min-width: 250px;
}
}

</style>
@section('content')

<div class="logo">
    <a href="/"><img src="{{asset('assets/images/ajantaone-logo.png')}}" class="" alt="logo"></a>
</div>

    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        {{-- <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57"> --}}
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Employee Id</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        
        @include('auth.partials.copy')
    </form>
@endsection
