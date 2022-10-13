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
  
                  <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-2 mt-1">Login</p>
                
                  <form class="mx-1 mx-md-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center mt-5">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          @if(session()->has('message'))
                          <div class="alert alert-danger">
                              {{ session()->get('message') }}
                          </div>
                      @endif
                          <input type="text"  class="form-control {{ $errors->has('nickname') || $errors->has('email') ? 'is-invalid' : '' }}"
                                        name="nickname" value="{{ old('nickname') ?: old('email') }}" required />
                          <label class="form-label">{{__('translation.register.nickname')}} {{__('translation.register.or')}} {{__('translation.register.email')}}</label>
				            @if ($errors->has('nickname') || $errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nickname') ?: $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="d-flex flex-row align-items-center mt-2">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password"  class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" />
                          <label class="form-label">{{__('translation.register.password')}}</label>
				            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    
  
                    <div class="d-flex justify-content-center mx-2 mb-1 mt-4 mb-lg-2">
                      <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>

                    <p class="text-center text-muted mt-1 mb-0">Dont have an account? 
                        <a href="register" class="fw-bold text-body"><u>Sign up here</u></a></p>
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
