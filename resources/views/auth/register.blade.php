@extends('layouts.app')

@section('content')
<section style="background-color: #09284b;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-13 pt-5 pb-5">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-4">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-2 mt-1">Sign up</p>
  
                  <form class="mx-1 mx-md-4" action="{{ route('register') }}">
  
                    <div class="d-flex flex-row align-items-center mt-5">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" type="text" class="form-control @error('nickname') is-invalid @enderror"
                                        name="nickname" value="{{ old('nickname') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.nickname')}}</label>
				            @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" type="text" class="form-control @error('firstname') is-invalid @enderror"
                                        name="firstname" value="{{ old('firstname') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.firstname')}}</label>
				            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                        name="lastname" value="{{ old('lastname') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.lastname')}}</label>
				            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.email')}}</label>
				            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" type="text" class="form-control @error('phonenumber') is-invalid @enderror"
                                        name="phonenumber" value="{{ old('phonenumber') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.phonenumber')}}</label>
				            @error('phonenumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example1c" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.password')}}</label>
				            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example1c" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" />
                          <label class="form-label" for="form3Example1c">{{__('translation.register.passwordrepeat')}}</label>
				            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
  
                    <div class="d-flex justify-content-center mx-2 mb-1 mt-4 mb-lg-2">
                      <button type="button" class="btn btn-primary btn-lg">Register</button>
                    </div>

                    <p class="text-center text-muted mt-1 mb-0">Have already an account? 
                        <a href="login" class="fw-bold text-body"><u>Login here</u></a></p>
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">  
                  <img src="https://img.freepik.com/free-vector/illustration-human-hobbies-activities_53876-44088.jpg?w=2000"
                    class="img-fluid" alt="Sample image">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
