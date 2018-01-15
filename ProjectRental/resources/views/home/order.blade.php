@extends('template.dashboard');
@section('isi')
		
		
    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Mobil</h5>
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
                    	
                    	<a class="btn btn-primary" href="{{ Url('/data_pelanggan') }}">Orderan Anda</a>

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>foto</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($listproduk as $baris)
                    <tr class="gradeX">
                        <td>{{ $baris->nama }}</td>
                        <td>{{ $baris->type }}</td>
                        <td class="center">{{ $baris->warna }}
                        </td>
                   
                  
                        <td>

                            <a href="{{ Url('uploads') }}/{{ $baris->foto }}" data-lightbox="gambar" data-title="{{ $baris->nama }}">
                            <img style="width: 200px; height: 135px;" src="{{ Url('uploads') }}/{{ $baris->foto }}"/>
                        </a>

                        </td>


                        <td>
                        
                                

                                 <a data-toggle="modal" href="#modal-form-{{ $baris->id }}" class="btn btn-info">Order</a>
                             </td>
                              </tr>

                            </form>
                            <!-- pop up update,form update-->
                            <div id="modal-form-{{ $baris->id }}" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Sewa Mobil</h3>

                                                   

                                                <form enctype="multipart/form-data" role="form" method="post" action="{{ Url('/proses_order') }}" class="form-horizontal">
                                                         <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                         <input type="hidden" name="id" value="{{ $baris->id }}"/>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Nama</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->nama }}" style="width:100%" type="text" name="nama_mobil" placeholder="Nama" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Type</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->type }}" style="width:100%" type="text" name="type" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Warna</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input value="{{ $baris->warna }}" style="width:100%" type="text" name="warna"  class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Nama Pemesan</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input style="width:100%" type="text" name="nama" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Alamat</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input style="width:100%" type="text" name="alamat" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input style="width:100%" type="email" name="email" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                     <div class="row">
                                                            <div class="col-md-2">
                                                            <label class="control-label">Lama Sewa</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <input style="width:100%" type="number" name="sewa" required="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <br/>

                                                        <div> 
                                                            <button style="width: 100%" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Sewa</strong></button>
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
                        <th>Nama</th>
                        <th>Type</th>
                        <th>Warna</th>
                        <th>foto</th>
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
