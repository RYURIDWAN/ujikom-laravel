@extends('main')
@section('title','Data Transaksi') <!-- Mengubah judul halaman menjadi Data Transaksi -->
@section('breadcrumbs')
<main id="main" class="main">
<div class="pagetitle">
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="./transactions">Master Data</a></li> <!-- Mengubah link ke Master Data transaksi -->
<li class="breadcrumb-item active">Data Transaksi</li> <!-- Mengubah nama breadcrumb menjadi Data Transaksi -->
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
<td><h5 class="card-title">Ubah Data Transaksi</span></h5></td> <!-- Mengubah judul menjadi Ubah Data Transaksi -->
<td>
<div align="right"><a href="{{ url('./transaction') }}" class="btn btn-success btn-sm" > <!-- Mengubah link kembali ke halaman transaksi -->
<span class="bi bi-arrow-left-circle-fill"
style="font-size:16px"> Back</span></a>
</div>
</td>
</tr>
</table>
<div class="col-12">
<div class="card recent-sales overflow-auto">
<div class="card-body">
<form action="{{ url('transaction/' . $transaction->id_transaction) }}" method="post" enctype="multipart/form-data"> <!-- Mengubah URL untuk form update transaksi -->
    @method('put')
    {{ csrf_field() }}
<div class="row mb-3">
<label for="id_transaction" class="col-sm-2 col-form-label">Id Transaksi</label> <!-- Mengubah label menjadi Id Transaksi -->
<div class="col-sm-10">
<input type="text" class="form-control" readonly value="{{ old('id_transaction', $transaction->id_transaction) }}" name="id_transaction" required autofocus>
</div>
</div>
<div class="row mb-3">
<label for="jenis_barang" class="col-sm-2 col-form-label">Nama Barang</label> <!-- Mengubah label menjadi Nama Barang -->
<div class="col-sm-10">
<input type="text"
class="form-control" value="{{ old('nama_barang', $transaction->nama_barang) }}" name="nama_barang" required autofocus>
</div>
</div>
<div class="row mb-3">
<label for="amount" class="col-sm-2 col-form-label">Jumlah Barang</label> <!-- Menambahkan kolom untuk jumlah barang -->
<div class="col-sm-10">
<input type="number" class="form-control" value="{{ old('amount', $transaction->amount) }}" name="amount" required autofocus>
</div>
</div>
<button type="submit" class="btn btn-success" style="font-size:16px"><span class="bi bi-pencil-square greencolor"> Update </span></button>
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
</div>
</section>
</main>
@endsection
