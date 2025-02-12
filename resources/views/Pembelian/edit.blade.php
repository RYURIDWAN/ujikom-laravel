@extends('main')
@section('title','Data Pembelian')
@section('breadcrumbs')
<main id="main" class="main">
<div class="pagetitle">
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="./pembelian">Master Data</a></li>
<li class="breadcrumb-item active">Data Pembelian</li>
</ol>
</nav>
</div>
<section class="section dashboard">
<div class="col-12">
<div class="row">
<div class="card top-selling overflow-auto">
<div class="content mt-3">
<div class="animated fadeIn">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="card-header">
<table width="100%" class="fa fa-text-height"
aria-hidden="true" border="0" cellpadding="0" cellspacing="0" class="fa faalign-center">
<tr>
<td><h5 class="card-title">Ubah Data Pembelian</h5></td>
<td>
<div align="right"><a href="{{ url('./pembelian') }}" class="btn btn-success btn-sm">
<span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a>
</div>
</td>
</tr>
</table>
</div>
<div class="col-12">
<div class="card recent-sales overflow-auto">
<div class="card-body">
<form action="{{ url('pembelian/' . $pembelian->id_Pembelian) }}" method="post" enctype="multipart/form-data">
    @method('put')
    {{ csrf_field() }}
<div class="row mb-3">
<label for="id_Pembelian" class="col-sm-2 col-form-label">Id Pembelian</label>
<div class="col-sm-10">
<input type="text" class="form-control" readonly value="{{ old('id_Pembelian', $pembelian->id_Pembelian) }}" name="id_Pembelian" required autofocus>
</div>
</div>
<div class="row mb-3">
<label for="Pembelian_barang" class="col-sm-2 col-form-label">Pembelian Barang</label>
<div class="col-sm-10">
<input type="text" class="form-control" value="{{ old('Pembelian_barang', $pembelian->Pembelian_barang) }}" name="Pembelian_barang" required autofocus>
</div>
</div>
<button type="submit" class="btn btn-success" style="font-size:16px">
<span class="bi bi-pencil-square green-color"> Update</span>
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
@endsection
