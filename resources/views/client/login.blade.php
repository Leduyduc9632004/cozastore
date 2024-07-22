@extends('client.main')

@section('title')
    Login
@endsection

@section('content')
    <div class="container py-5 h-100 my-3">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form method="post" action="">
                    @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                    @if (session()->has('message'))
                      <div class="alert alert-danger">
                        {{session()->get('message')}}                      
                      </div>
                    @endif
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
  
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Username</label>
                      <input type="text" name="username" id="form2Example17" class="form-control form-control-lg" />
                    </div>
  
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
  
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('client.register')}}"
                        style="color: #393f81;">Register here</a></p>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection