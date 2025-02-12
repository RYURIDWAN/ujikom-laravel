<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sign Up - Aplikasi Inventory</title>
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
                <div class="card px-5 py-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Sign Up</h2>
                        <form action="{{ route('auth.signup') }}" method="POST">
                            @csrf
                            <!-- Input Name -->
                            <div class="forms-inputs mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" autocomplete="off"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input Email -->
                            <div class="forms-inputs mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" autocomplete="off"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
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
                            <!-- Input Password Confirmation -->
                            <div class="forms-inputs mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    autocomplete="off"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Confirm your password" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input Role -->
                            <div class="forms-inputs mb-4">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role"
                                    class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select your role</option>
                                    <option value='Manager'>Manager</option>
                                    <option value='Staff'>Staff</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success w-100">Sign Up</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <small>
                                Already have an account?
                                <a href="{{ route('auth.login') }}" class="text-primary">Login here</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>