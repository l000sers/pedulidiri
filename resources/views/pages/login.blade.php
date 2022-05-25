@extends('layouts.masterLogin')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="{{ asset ('assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login</h4></div>

            <div class="card-body">
              <form method="POST" action="/loginPage" class="needs-validation" novalidate="">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">NIK</label>
                  <input id="nik" type="text" class="form-control" name="nik" tabindex="1" required autofocus>
                  <div class="invalid-feedback">
                    Please fill in your Nik
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Nama</label>
                   
                  </div>
                  <input id="name" type="text" class="form-control" name="name" tabindex="2" required>
                  <div class="invalid-feedback">
                    please fill in your name
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">email</label>
                  <input id="email" type="email" class="form-control" name="email" placeholder="ucokrockstar@gmail.com" tabindex="1" required autofocus>
                  <div class="invalid-feedback">
                    Please fill in your email
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">password</label>
                   
                  </div>
                  <input id="password" type="password" class="form-control" name="password" placeholder="ucokbaba" tabindex="2" required>
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>


                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
             
            </div>
          </div>
          
          <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
  

  