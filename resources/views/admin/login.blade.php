<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('theme/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <title>Login-admin</title>
</head>
<body>
    <div class="container py-5 h-100 my-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-6">
            <div class="card" style="border-radius: 1rem;">
                  <div class="card-body p-4 p-lg-5 text-black">
                    <form method="post" action="{{route('confirmLoginAdmin')}}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error )
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
                        @csrf
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
                    </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
</body>
</html>