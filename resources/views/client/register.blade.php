@extends('client.main')

@section('title')
    Register
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

                                <form method="POST" action="{{ route('client.confirmRegister') }}">
                                    @csrf

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register a new account</h5>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label">Full name</label>
                                        <input type="text" name="name" id="form2Example17"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="form2Example17"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" id="form2Example17"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" name="phone" id="form2Example17"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" id="form2Example17"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <input type="password" name="password" id="form2Example27"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Do you have an account?<a
                                            href="{{ route('client.login') }}" style="color: #393f81;">Login here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
