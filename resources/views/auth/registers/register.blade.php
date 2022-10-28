@extends('auth.layouts.authapp')
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        Zlaundry
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-up.html">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-in.html">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/argon-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-light"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@section('content')
<div class="page-header bg-primary align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" ">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pt-4">
            <h5>Register</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Username" aria-label="Name" value="{{ old('username') }}">
                @error('username')
                  <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="Name" value="{{ old('name') }}">
                @error('name')
                  <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                @error('email')
                  <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                @error('password')
                  <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                @enderror
              </div>
              <div class="form-check form-check-info text-start">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
              </div>
              <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
