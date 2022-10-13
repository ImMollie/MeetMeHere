@extends('layouts.app')

@section('content')
<section style="background-color: #09284b; height:100%;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-13 pt-5 pb-5">
          <div class="formCard text-black" style="border-radius: 25px;">
            <div class="card-body p-md-4">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Your about to add your announcement,<br>check some info before!</p>
  
                  <p class="text-center h4 mb-3 mx-1 mx-md-2 mt-1">Remember about this: and this: XD</p>
                    <div class="d-flex justify-content-center mx-2 mb-1 mt-4 mb-lg-2">
                      <a href="addAnnouncement-step-1" class="btn btn-primary btn-lg">Start</a>
                    </div>
                    
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">  
                  <img src="https://static.vecteezy.com/system/resources/thumbnails/008/882/067/small_2x/businessman-with-megaphone-giving-information-to-confused-customer-business-communication-concept-colored-flat-graphic-illustration-isolated-vector.jpg"
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
