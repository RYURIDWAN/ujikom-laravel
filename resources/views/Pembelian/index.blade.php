@extends('main')
@section('title','Pembelian')
@section('breadcrumbs')
<main id="main" class="main">
<div class="pagetitle">
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="./anggotas">Master Data</a></li>
<li class="breadcrumb-item active">Data Pembelian barang</li>
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
<div class="alert alert-warning alertdismissible fade show" role="alert">
<strong>Proses...! </strong> {{
session('status') }}
<button type="button" class="btn-close" databs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card-header">
<table width="100%" border="0"
cellpadding="0" cellspacing="0">
<tr>
<td><h5 class="card-title">Data Pembelian
Barang</span></h5></td>
<td>
<div align="right">
<a href="{{
url('Pembelians/show')}}" class="btn btn-success btn-sm" role="button" ariadisabled="true">
<span class="bi bi-printer"
style="font-size:16px"> Print Data</span> </a>
<a href="{{
url('impPembelian')}}" class="btn btn-success btn-sm" role="button" ariadisabled="true">
<span class="bi bi-upload"
style="font-size:16px"> Import Data</span> </a>
<a href="{{
url('expPembelian')}}" class="btn btn-success btn-sm" role="button" ariadisabled="true">
<span class="bi bi-file-earmarkexcel" style="font-size:16px"> Export Data </span> </a>
<a href="{{
url('Pembelian/create')}}" class="btn btn-success btn-sm">
<span class="bi bi-plus-circle"
style="font-size:16px"> New</span></a>
</div>
</tr>
</table>
</div>
<div class="card-body table-responsive">
<table class="table table-borderless
datatable">
<thead>
<tr>
<th>No.</th>
<th>Id Pembelian</th>
<th>Pembelian Barang</th>
<th>Ubah</th>
<th>Hapus</th>
</tr>
</thead>
<tbody>
@foreach ($Pembelian as $item)
<tr>
<td>{{$loop ->
iteration}}</td>
<td>{{$item ->
id_Pembelian}}</td>
<td>{{$item ->
Pembelian_barang}}</td>
<td>
<a href="{{
url('Pembelian/' .$item->id_Pembelian.'/edit')}}" class="btn btn-success btn-sm" >
<span class="bi
bi-pencil-square" style="font-size:12px"></span></a>
</td>
<td>
<form action="{{url('Pembelian/' .$item->id_Pembelian)}}" method="post" class="d-inline" onsubmit="return
confirm('Yakin Hapus Data')">
@method('delete')
@csrf
<button
class="btn btn-success btn-sm"><span class="bi bi-trash"></span></button>
</td>
</form>
</
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
@endsection