@extends('template.dashboard')
@section('isi')

<!-- Carosel / Slider-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

  <!-- Wrapper for slides -->
  <div align="center">
  <div class="carousel-inner">
    <div class="item active">
      <img src="uploads/apv.png" style="width: 30%; height: 15%;" alt="veleg 1">
    </div>

    <div class="item">
      <img src="uploads/datsun.jpg" style="width: 30%; height: 15%;" alt="veleg 2">
    </div>

    <div class="item">
      <img src="uploads/isuzu.jpg" style="width: 30%; height: 15%;"  alt="veleg 3">
    </div>

    <div class="item">
      <img src="uploads/grand-max-daihatsu.jpg" style="width: 30%; height: 15%;"  alt="veleg 3">
      </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br><br>

<!--JUDUL PARAGRAF -->
<div align="center">
<h1> Ari Car </h3>
<p> Kebutuhan akan sarana transportasi terus meningkat seiring dengan semakin banyaknya kebutuhan pengiriman barang dan perpindahan manusia itu sendiri, faktor keamanan, kenyamanan, dan kecepatan yang harus dicapai pada tempat tujuan menjadi salah satu permasalahan yang harus dapat diatasi guna efisiensi dan penghematan biaya transportasi tersebut.
Dengan begitu banyaknya aktivitas dan kebutuhan masyarakat, maka dibutuhkan sarana tranportasi yang memadai sebagai sarana penunjang untuk mengangkut manusia dan berbagai aktivias dan kebutuhan sehari-hari masyarakat. Salah satu sarana transportasi yang cukup efektif dan efisien guna menunjang kebutuhan dan aktivitas masyarakat adalah kendaraan bermotor
Untuk itu diperlukan sarana transportasi cukup yang memadai untuk menunjang kebutuhan tersebut. Car Rental hadir untuk menjawab kebutuhan tersebut
 </p>


@endsection()