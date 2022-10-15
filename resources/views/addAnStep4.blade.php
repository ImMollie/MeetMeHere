@extends('layouts.app')

@section('content')
<section style="background-color: #09284b; height:100%;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center h-100">
        <div class="col-lg-12 col-xl-13 pt-5 pb-5">
          <div class="formCard text-black" style="border-radius: 25px;">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('announcement.post.step.4') }}" method="POST">
              @csrf
            <div class="card-header">
              <div class="row">
                  <div class="col-md-1 pt-2">
                      <a href="{{ route('announcement.create.step.3') }}" class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                  </div>
                  <div class="col-md-10">
                      <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 4</p>                        
                  </div>                    
              </div> 
            </div>
            <div class="card-body p-md-4">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">  
                  <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Describe your meeting!</p>  
                  <p class="text-center h4 mb-3 mx-1 mx-md-2 mt-1">Again remember about this: and this: XD</p>
                </div>
              </div>
              
                <div class="d-flex justify-content-center">  
                  <div class="p-3">
                    <textarea id="address" class="form-control" name="description" placeholder="Describe it..." rows="13" cols="45"></textarea>
                  </div>
                </div>
              
                <div class="row justify-content-end">						
                  <button type="submit" class="quiz_continueBtn mt-5" style="max-width: 100%">Finish</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
