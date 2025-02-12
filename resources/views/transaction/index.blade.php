@extends('main') 
@section('title', 'Transactions') 
@section('breadcrumbs') 
<main id="main" class="main">  
    <div class="pagetitle"> 
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./transaction">Master Data</a></li>
                <li class="breadcrumb-item active">Transactions</li>
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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Proses...! </strong> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            @endif  

                            <div class="card-header"> 
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><h5 class="card-title">Transaction Data</h5></td>
                                        <td> 
                                            <div align="right">    
                                                <a href="{{ url('transaction/create') }}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-plus-circle" style="font-size:16px"> New</span>
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
                                            <th>Transaction ID</th>
                                            <th>Inventory ID</th>
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Documentation</th>
                                            <th>Approved ID</th>
                                            <th>Description</th>
                                            <th>Good Stock</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->transaction_id }}</td>
                                            <td>{{ $item->inventory_id }}</td>
                                            <td>{{ $item->product_name }}</td> 
                                            <td>{{ $item->type }}</td> 
                                            <td>
                                                @if($item->documentation)
                                                    <a href="{{ Storage::url($item->documentation) }}" target="_blank">View</a>
                                                @else
                                                    No Documentation
                                                @endif
                                            </td>
                                            <td>{{ $item->approved_id }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ isset($item->good_stock) ? $item->good_stock : 'N/A' }}</td>

                                            <td>
                                                <a href="{{ url('transaction/' . $item->transaction_id . '/edit') }}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-pencil-square" style="font-size:12px"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ url('transaction/' . $item->transaction_id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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
