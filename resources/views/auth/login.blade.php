<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Aplikasi Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-4" id="form1">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        @if (session('success'))
                            <div class="success-data">
                                <div class="text-center d-flex flex-column">
                                    <i class='bx bxs-badge-check'></i>
                                    <span class="text-center fs-1">You have been logged in <br> Successfully</span>
                                </div>
                            </div>
                        @else
                            <div class="form-data">
                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf
                                    <!-- Input Email -->
                                    <div class="forms-inputs mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="off"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter your email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Input Password -->
                                    <div class="forms-inputs mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" autocomplete="off"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Error from session -->
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <!-- Submit Button -->
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success w-100">Login</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <small>
                            Don't have an account?
                            <a href="{{ route('auth.signUpForm') }}" class="text-primary">Sign up here</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>