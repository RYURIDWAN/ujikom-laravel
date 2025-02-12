@extends('main') 
@section('title', 'Edit Transaction') 
@section('breadcrumbs') 
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./transaction">Master Data</a></li>
                <li class="breadcrumb-item"><a href="{{ url('transaction') }}">Transactions</a></li>
                <li class="breadcrumb-item active">Edit Transaction</li>
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
                                <h5 class="card-title">Edit Transaction</h5>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('transaction.update', $transaction->transaction_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="transaction_id" class="col-sm-2 col-form-label">Transaction ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $transaction->transaction_id }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inventory_id" class="col-sm-2 col-form-label">Inventory</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="inventory_id" required>
                                                @foreach ($inventory as $item)
                                                    <option value="{{ $item->inventory_id }}" 
                                                        {{ old('inventory_id', $transaction->inventory_id) == $item->inventory_id ? 'selected' : '' }}>
                                                        {{ $item->product_name }} (ID: {{ $item->inventory_id }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('type', $transaction->type) }}" name="type" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="documentation" class="col-sm-2 col-form-label">Documentation (Upload File)</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="documentation">
                                            @if ($transaction->documentation)
                                                <p><strong>Current File:</strong> <a href="{{ Storage::url($transaction->documentation) }}" target="_blank">View File</a></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="approved_id" class="col-sm-2 col-form-label">Approved ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('approved_id', $transaction->approved_id) }}" name="approved_id" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ old('description', $transaction->description) }}" name="description" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="good_stock" class="col-sm-2 col-form-label">Good Stock</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" value="{{ old('good_stock', $transaction->good_stock) }}" name="good_stock" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update Transaction</button>
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
