@extends('home.dashboard')
@section('isi')


            <form class="m-t" role="form" enctype="multipart/form-data" method="POST" action="{{ Url('/proses_update_produk') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- token dipakai saat ada form-->



		<label class="control-label">Nama</label>
		<input style="width: 50%;" type="text" autofocus="" name="nama" class="form-control"/>
		<p style="color: red;">{{ $errors->first('nama') }}</p>

		<label  class="control-label">Type</label>
		<select style="width: 50%;" name="type" class="form-control">
			<option value="sedan">Sedan</option>
			<option value="city car">City Car</option>
			<option value="elf">Elf</option>
			<p style="color: red;">{{ $errors->first('type') }}</p>
		</select>

		<label class="control-label">Warna</label>
		<input style="width: 50%;" type="text" autofocus="" name="warna" class="form-control"/>
		<p style="color: red;">{{ $errors->first('warna') }}</p>

		<label class="control-label">Foto</label>
		<input type="file" min="0" name="foto" required="" accept="image/*"/>
		<p style="color: red;">{{ $errors->first('foto') }}</p>
		<br/>

		<button style="width: 50%;" type="submit" class="btn btn-primary">Update</button>
	
	</form>

@endsection