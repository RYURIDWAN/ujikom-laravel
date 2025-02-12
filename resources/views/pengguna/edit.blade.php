@extends('main')
@section('title', 'Ubah Data Pengguna')

@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('pengguna') }}">Master Data</a></li>
                <li class="breadcrumb-item active">Ubah Data Pengguna</li>
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
                                        <td><h5 class="card-title">Ubah Data Pengguna</h5></td>
                                        <td>
                                            <div align="right">
                                                <a href="{{ url('pengguna') }}" class="btn btn-success btn-sm">
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
                                        <!-- Form action dengan URL sesuai dengan id -->
                                        <form action="{{ url('/pengguna/' . $pengguna->User_id) }}" method="post">
                                            @method('put')
                                            @csrf

                                            <!-- Field untuk User ID (readonly) -->
                                            <div class="row mb-3">
                                                <label for="User_id" class="col-sm-2 col-form-label">User ID</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" readonly value="{{ old('User_id', $pengguna->User_id) }}" name="User_id">
                                                </div>
                                            </div>

                                            <!-- Field untuk Name -->
                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $pengguna->name) }}" name="name" required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Field untuk Email -->
                                            <div class="row mb-3">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pengguna->email) }}" name="email" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Field untuk Password (kosongkan jika tidak diubah) -->
                                            <div class="row mb-3">
                                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $pengguna->password) }}" required>
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Field untuk Role -->
                                            <div class="row mb-3">
                                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                                        <option value="manager" {{ old('role', $pengguna->role) == 'manager' ? 'selected' : '' }}>Manager</option>
                                                        <option value="staff" {{ old('role', $pengguna->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                                                    </select>
                                                    @error('role')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
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
