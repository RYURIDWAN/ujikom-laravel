@extends('main') 
@section('title', 'Create Transaction') 
@section('breadcrumbs') 
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./transaction">Master Data</a></li>
                <li class="breadcrumb-item"><a href="{{ url('transaction') }}">Transactions</a></li>
                <li class="breadcrumb-item active">Create Transaction</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="col-12">
            <div class="row">
                <div class="card top-selling overflow-auto">
                    <div class="content mt-3">
                        <div class="animated fadeIn">
                            <div class="card-header">
                                <h5 class="card-title">Create New Transaction</h5>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row mb-3">
                                        <label for="inventory_id" class="col-sm-2 col-form-label">Inventory</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="inventory_id" required>
                                                <option value="" disabled selected>Select Inventory</option>
                                                @foreach ($inventory as $item)
                                                    <option value="{{ $item->inventory_id }}">
                                                        {{ $item->product_name }} (ID: {{ $item->inventory_id }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="type" required>
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="Inbound">Inbound</option>
                                                <option value="Outbound">Outbound</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="documentation" class="col-sm-2 col-form-label">Documentation (Upload File)</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="documentation" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="approved_id" class="col-sm-2 col-form-label">Approved ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="approved_id" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="description" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="good_stock" class="col-sm-2 col-form-label">Good Stock</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="good_stock" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Create Transaction</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
