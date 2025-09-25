<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12" style="max-width:420px;">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h4 class="mb-3 text-center">Login</h4>

            @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
              </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
              @csrf

              <div class="mb-3">
                <label for="login" class="form-label">Username or Email</label>
                <input type="text" name="login" id="login" class="form-control"
                       value="{{ old('login') }}" required autofocus>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>

              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
