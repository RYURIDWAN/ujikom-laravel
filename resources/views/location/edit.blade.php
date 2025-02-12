@extends('main')
@section('title', 'Ubah Location Barang')

@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('location') }}">Master Data</a></li>
                <li class="breadcrumb-item active">Ubah Location Barang</li>
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
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><h5 class="card-title">Ubah Location Barang</h5></td>
                                        <td>
                                            <div align="right">
                                                <a href="{{ url('location') }}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                        <form action="{{ url('location/' . $location->location_id) }}" method="post">
                                            @method('put')
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="location_id" class="col-sm-2 col-form-label">Id Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" readonly value="{{ old('location_id', $location->location_id) }}" name="location_id">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">Location Barang</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{ old('name', $location->name) }}" name="name" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" required>{{ old('description', $location->description) }}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success">
                                                <span class="bi bi-pencil-square"> Update</span>
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
    </section>
</main>
@endsection
