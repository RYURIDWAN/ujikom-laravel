@extends('main')
@section('title', 'Data Inventory')
@section('breadcrumbs')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./inventory">Master Data</a></li>
                    <li class="breadcrumb-item active">Data Inventory</li>
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
                                    <table width="100%" class="fa fa-text-height" aria-hidden="true" border="0"
                                        cellpadding="0" cellspacing="0" class="fa fa-align-center">
                                        <tr>
                                            <td>
                                                <h5 class="card-title">Tambah Data Inventory</span></h5>
                                            </td>
                                            <td>
                                                <div align="right"><a href="{{ url('./inventory') }}"
                                                        class="btn btn-success btn-sm">
                                                        <span class="bi bi-arrow-left-circle-fill" style="font-size:16px">
                                                            Back</span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="col-12">
                                        <div class="card recent-sales overflow-auto">
                                            <div class="card-body">

                                                <form action="{{ url('inventory') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}

                                                    <!-- ID Inventory -->
                                                    <div class="row mb-3">
                                                        <label for="inventory_id" class="col-sm-2 col-form-label">Id
                                                            Inventory</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                value="{{ old('inventory_id') }}" name="inventory_id"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Product Name -->
                                                    <div class="row mb-3">
                                                        <label for="product_name" class="col-sm-2 col-form-label">Product
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                value="{{ old('product_name') }}" name="product_name"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="row mb-3">
                                                        <label for="description"
                                                            class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                value="{{ old('description') }}" name="description">
                                                        </div>
                                                    </div>

                                                    <!-- Quantity Good -->
                                                    <div class="row mb-3">
                                                        <label for="quantity_good" class="col-sm-2 col-form-label">Quantity
                                                            Good</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control"
                                                                value="{{ old('quantity_good') }}" name="quantity_good"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Expired -->
                                                    <div class="row mb-3">
                                                        <label for="expired"
                                                            class="col-sm-2 col-form-label">Expired</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control"
                                                                value="{{ old('expired') }}" name="expired">
                                                        </div>
                                                    </div>

                                                    <!-- Location -->
                                                    <div class="row mb-3">
                                                        <label for="location_id"
                                                            class="col-sm-2 col-form-label">Location</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="location_id" required>
                                                                <option value="" disabled selected>Select Location
                                                                </option>
                                                                @foreach ($locations as $location)
                                                                    <option value="{{ $location->location_id }}">
                                                                        {{ $location->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Status -->
                                                    <div class="row mb-3">
                                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="status" required>
                                                                <option value="Active"
                                                                    {{ old('status') == 'Active' ? 'selected' : '' }}>
                                                                    Active</option>
                                                                <option value="Inactive"
                                                                    {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                                                    Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Unit -->
                                                    <div class="row mb-3">
                                                        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                value="{{ old('unit') }}" name="unit" required>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Save</button>
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