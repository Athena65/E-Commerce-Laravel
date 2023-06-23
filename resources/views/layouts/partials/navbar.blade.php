<!DOCTYPE html>
<html>
<head>
  <title>Navbar Örneği</title>
  <style>
    body {
      margin-top: 70px; /* Navbar'ın sayfanın üstünde kalmasını sağlar */
    }
  </style>
</head>
<body>
  <header class="p-3 bg-dark text-white fixed-top"> <!-- fixed-top sınıfı ile navbar sabit olarak üstte kalır -->
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        @auth
        
        <li class="list-group-item">Welcome {{ auth()->user()->username }}</li>
        </ul>


          {{auth()->user()->name}}
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth

        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
          </div>
        @endguest
      </div>
    </div>
  </header>
</body>
</html>