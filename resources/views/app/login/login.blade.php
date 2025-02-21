<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    h1 {
        font-weight: bolder;
        font-family: monospace;
        text-shadow: 1px 1px green;
}
</style>
<body>
    <div class="mt-5 text-center container">
        <h1>Login User</h1>
        <div>

            @if (session('success'))
                <div class="alert alert-success container alert-dismissible fade show">
                    <strong>Success!! </strong> {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger container alert-dismissible fade show">
                    <strong>Failure!! </strong>{{ session('error') }}
                </div>
            @endif
    
        </div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Autentikasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>