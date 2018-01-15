<?php

namespace App\Http\Controllers;

use Auth;//untuk otentivfikasi (login)
use Hash; //bila memakai hash
use App\TblKendaraan;
use App\TblDaftar;
use App\TblPelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    function beranda()
    {
        return view('home.beranda');
    }

    function register()
    {
        return view('home.register');
    }

    function proses_daftar(Request $request)//request menerima data  dari form
    {
        $nama = $request -> input("nama");
        $email = $request -> input("email");
        $password = Hash::make ($request -> input("password")); //hash untuk enkripsi 

        // input data ke database
        $data = new TblDaftar;
        $data->nama = $nama;
        $data->email = $email;
        $data->akses = 'user';
        $data->kode = uniqid();
        $data->status = 0;
        $data->password = $password;
        $data->save(); // = menggantikan insert into ...

        return redirect('login');
    }


    function login()
    {
        return view('home.login');
    }

    function proses_login(Request $request)
    {
        $email = $request -> input("email");
        $password = $request->input("password");

        //cek login
        if(Auth::attempt(['email'=>$email, 'password'=>$password]))
            {
                // login sukses
                return redirect('/beranda');
            }
            else
            {
                //Login gagal
                $request->Session()->flash("status", 0);
                return redirect('/login');
            }
    }

    function logout()
    {
         Auth::logout();
    return redirect('/login');
    }


    function dashboard()
    {
        return view('template.dashboard');
    }

   /* function menu()
    {
        return view('home.menu');
    } */

    function order()
    {
        $data = TblKendaraan::all();
    return view('home.order',["listproduk"=>$data]);
    }

    function produks()
    {
        $data = TblKendaraan::all();
    return view('home.list',["listproduk"=>$data]);
    }

    function proses_order(Request $request)
    {
        $all=$request->all();

          Validator::make(
      $all,
      [
        "nama"=>"required|max:30",// nama tidak boleh sama
        "type"=>"required",
        "foto"=>"image",
        "alamat"=>"required",
        "email"=>"required",
        "sewa"=>"numeric|min:1|max:3"
      ],
  
      [ // pesan(masage)   
        "nama.required"=>"Nama anda wajib diisi !",
        "email.required"=>"Email anda wajib diisi !",
        "alamat.required"=>"Alamat anda wajib diisi !",
        "nama.max"=>"Nama maksimal 30 karakter ! ",
        "foto.image"=>"Harus berupa file gambar !",
      ]
    )->validate();
        $nama_mobil=$request->input("nama_mobil");
        $type=$request->input("type");
        $warna=$request->input("warna");
        $nama=$request->input("nama");
        $alamat=$request->input("alamat");
        $email=$request->input("email");
        $sewa=$request->input("sewa");

        $data = new TblPelanggan;
        $data->nama_mobil = $nama_mobil;
        $data->type = $type;
        $data->warna = $warna;
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->email = $email;
        $data->sewa = $sewa;
        $data->save();

        return redirect('/data_pelanggan');

    }

    function data_pelanggan()
    {
        $data = TblPelanggan::all();
    return view('home.data_pelanggan',["listpelanggan"=>$data]);
    }

    function proses_update_pelanggan(Request $request)
    {
        $id=$request->input("id");
        $nama_mobil=$request->input("nama_mobil");
        $type=$request->input("type");
        $warna=$request->input("warna");
        $nama=$request->input("nama");
        $alamat=$request->input("alamat");
        $email=$request->input("email");
        $sewa=$request->input("sewa");

        $data = TblPelanggan::find($id);
        
        $data->nama_mobil = $nama_mobil;
        $data->type = $type;
        $data->warna = $warna;
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->email = $email;
        $data->sewa = $sewa;
        $data->save();

        return redirect('/data_pelanggan');

    }

    function hapus_pelanggan(Request $request)
    {
        $id= $request->input("id");

        $data = TblPelanggan::find($id);
        $data->delete();

        return redirect('/data_pelanggan');
    }

    function tambahmobil()
    {
        return view('home.tambahmobil');
    }

    function proses_tambahmobil(Request $request)
    {
        $all=$request->all();

        Validator::make(
      $all,
      [
        "nama"=>"required|max:30",// nama tidak boleh sama
        "type"=>"required",
        "foto"=>"image",
        "warna"=>"required"
      ],
  
      [ // pesan(masage)   
        "nama.required"=>"Nama wajib diisi !",
        "nama.required"=>"Alamat anda wajib diisi !",
        "nama.max"=>"Nama maksimal 30 karakter ! ",
        "foto.image"=>"Harus berupa file gambar !",
        "type.required"=>"Type Wajib diisi !",
      ]
    )->validate();



        $nama=$request->input("nama");
        $type=$request->input("type");
        $warna=$request->input("warna");
        $foto=$request->file("foto");

        $foto->move('uploads',$foto->getClientOriginalName());

        $data = new TblKendaraan;
        $data->nama = $nama;
        $data->type = $type;
        $data->warna = $warna;
        $data->foto = $foto->getClientOriginalName();//kusus foto
        $data->save();

        return redirect('/produks');


    }

    function hapus_produk(Request $request)
    {
        $id= $request->input("id");

        $data = TblKendaraan::find($id);
        $data->delete();

        return redirect('/produks');
    }

    function proses_update_produk(Request $request)
    {

       /* $all=$request->all(); 
  Validator::make(
      $all,
      [
        "nama"=>"required|max:30",// nama tidak boleh sama
        "type"=>"required",
        "foto"=>"image",
        "warna"=>"required"
      ],
  
      [ // pesan(masage)   
        "nama.required"=>"Nama wajib diisi !",
        "nama.required"=>"Alamat anda wajib diisi !",
        "nama.max"=>"Nama maksimal 30 karakter ! ",
        "foto.image"=>"Harus berupa file gambar !",
        "type.required"=>"Type Wajib diisi !",
      ]
    )->validate();*/


        $id=$request->input("id");
        $nama=$request->input("nama");
        $type=$request->input("type");
        $warna=$request->input("warna");
        $foto=$request->file("foto");

        //cari bardasarkan id
    $data = TblKendaraan::find($id);
     if($foto!=NULL){
    $foto->move('uploads',$foto->getClientOriginalName());  
     }

         $data->nama = $nama;
         $data->type = $type;
         $data->warna = $warna;
        if($foto!=NULL){ // jika tidak ingin ubah foto
        $data->foto = $foto->getClientOriginalName();
         
     }
     $data->save();

         return redirect('/produks');

    }

    function update()
    {
        return view('home.update');
    }
}
