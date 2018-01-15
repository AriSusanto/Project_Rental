@extends('template.dashboard');
@section('isi')
		
		
    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Sewa Pelanggan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">


                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Mobil</th>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Lama Sewa(Hari)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($listpelanggan as $baris)
                    <tr class="gradeX">
                        <td>{{ $baris->nama_mobil }}</td>
                        <td>{{ $baris->type }}</td>
                        <td>{{ $baris->warna }}</td>
                        <td>{{ $baris->nama }}</td>
                        <td>{{ $baris->alamat }}</td>
                        <td>{{ $baris->email }}</td>
                        <td class="center">{{ $baris->sewa }}
                        </td>


                        <td>
                            @if(Auth()->user()->akses == 'admin')
                                  <!--tombol hapus-->
                            <form method="post" action="{{ Url('/hapus_pelanggan') }}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                              <input type="hidden" name="id" value="{{ $baris->id }}"/>
                            
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                

                                 <a data-toggle="modal" href="#modal-form-{{ $baris->id }}" class="btn btn-info">Update</a>
                             </td>
                              </tr>

                            </form>
                            @endif
                            <!-- pop up update,form update-->
                            <div id="modal-form-{{ $baris->id }}" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Data Pelanggan</h3>

                                                   

                                                <form enctype="multipart/form-data" role="form" method="post" action="{{ Url('/proses_update_pelanggan') }}" class="form-horizontal">
                                                         <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                         <input type="hidden" name="id" value="{{ $baris->id }}"/>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Nama</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->nama_mobil }}" style="width:100%" type="text" name="nama_mobil" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Type</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->type }}" style="width:100%" type="text" name="type" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Warna</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->warna }}" style="width:100%" type="text" name="warna" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Nama Pemesan</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->nama }}" style="width:100%" type="text" name="nama" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Alamat</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->alamat }}" style="width:100%" type="text" name="alamat" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->email }}" style="width:100%" type="email" name="email" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Lama Sewa</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->sewa }}" style="width:100%" type="number" name="sewa" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>

                                                        <div> 
                                                            <button style="width: 100%" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Update</strong></button>
                                                        </div>
                                                </form>
                                                
                                                </div>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    
                        </td>
                     </tr>
                     @endforeach

                    

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Mobil</th>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Lama Sewa (Hari)</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>


@endsection()
