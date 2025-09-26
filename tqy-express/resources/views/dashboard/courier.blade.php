<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Courier Dashboard</title></head>
<body>
  <h1>Congrats u are logged in as a {{ auth()->user()->role }}</h1>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
  </form>
</body>
</html>
