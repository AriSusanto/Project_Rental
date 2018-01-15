@extends('template.dashboard')

@section('judul')
    Registrasi
@endsection

@section('isi')

 <div align="center">
                 <h2 class="logo-name fa fa-car",>Ri</h2>

<form class="m-t" role="form" method="POST" action="{{ Url('/proses_daftar') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- token dipakai saat ada form-->

                <div class="form-group">
                    <input style="width: 30%;" type="text" name="nama" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                    <input style="width: 30%;" type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input style="width: 30%;" type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button style="width: 30%;" type="submit" class="btn btn-primary ">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a style="width: 30%;" class="btn btn-sm btn-white btn-block" 
                href="{{Url ('/login')}}">Login</a> <!--untuk kembali ke form login-->
            </form>
        </div>
@endsection
