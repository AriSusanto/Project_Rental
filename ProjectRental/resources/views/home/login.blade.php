@extends('template.dashboard')

@section('judul')
    Login
@endsection

@section('isi')
            
             <div align="center">
                 <h2 class="logo-name fa fa-car",>Ri</h2>
          

            @if(Session::has("status"))
                <div style="width: 30%;" class="alert alert-danger">
                {{ Lang::get("login.notifikasi")}} <a style="width: 30%" class="alert-link" href="#"></a>
                </div>
            @endif
                       
            <form class="m-t" role="form" method="POST" action="{{ Url('/proses_login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- token dipakai saat ada form-->

                <div class="form-group">
                    <input style="width: 30%;" type="email" name="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input style="width: 30%;" type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button style="width: 30%;" type="submit" class="btn btn-primary block">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a style="width: 30%" class="btn btn-sm btn-white btn-block" 
                href="{{Url ('/register')}}">Create an account</a><!--untuk kembali ke form register-->
            </form>
        </div>

@endsection