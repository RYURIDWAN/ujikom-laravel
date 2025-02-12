@extends('main')
@section('title', 'Inventory')
@section('breadcrumbs')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./jenis">Master Data</a></li>
                    <li class="breadcrumb-item active">Inventory</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="col-12">
                <div class="row">
                    <div class="card top-selling overflow-auto">
                        <div class="content mt-3">
                            <div class="animated fadeIn">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Sukses! </strong> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Error! </strong> {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="card-header">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <h5 class="card-title">Data Inventory</h5>
                                            </td>
                                            <td>
                                                <div align="right">
                                                    <a href="{{ url('inventory/create') }}" class="btn btn-success btn-sm">
                                                        <span class="bi bi-plus-circle" style="font-size:16px">
                                                            New</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Inventory</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Quantity Good</th>
                                                <th>Expired</th>
                                                <th>Status</th>
                                                <th>Unit</th>
                                                <th>Location</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventory as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->inventory_id }}</td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->quantity_good }}</td>
                                                    <td>{{ $item->expired }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>{{ $item->location_name ?? 'N/A' }}</td>
                                                    <!-- Menampilkan Nama Lokasi -->
                                                    <td>
                                                        <a href="{{ url('inventory/' . $item->inventory_id . '/edit') }}"
                                                            class="btn btn-success btn-sm">
                                                            <span class="bi bi-pencil-square" style="font-size:12px"></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ url('inventory/' . $item->inventory_id) }}"
                                                            method="post" class="d-inline"
                                                            onsubmit="return confirm('Yakin Hapus Data?')">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm">
                                                                <span class="bi bi-trash"></span>
                                                            </button>
                                                        </form>
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