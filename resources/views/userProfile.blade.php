@extends('layouts.app')
@section('content')
<x-header/>
    <div class="container mt-5">
        <div class="main-body">
            <form method="POST" action="{{ route('profileUpdate') }}" enctype="multipart/form-data">
                @csrf
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center"> 
                                    @if($elements->photo)                                   
                                    <img src="{{asset('/storage/images/usersPhotos/'.$elements->photo)}}" alt="Admin" class="rounded-circle" width="150">
                                    @else
                                    <img src="{{asset('/storage/images/usersPhotos/placeholder.png')}}" alt="Admin" class="rounded-circle" width="150">
                                    @endif
                                    <div class="mt-3">
                                        <h4>{{ $elements->firstname }} {{ $elements->lastname }}</h4>
                                        <p class="text-secondary mb-1">{{ $elements->nickname }}</p>
                                        <p class="text-muted font-size-sm">Poland, {{ $elements->city }}</p>
                                        @if (isset($switcher))
                                            @if ($switcher)
                                            <div class="btn btn-primary">
                                                <label class="text-white" for="customFile2">Change picture</label>
                                                <input type="file" class="form-control d-none" id="customFile2" name="photo"/>
                                            </div>
                                            @endif
                                        @endif
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3 showSocial">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg> Twitter</h6>
                                    <span class="text-secondary">{{ $elements->twitter }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg> Instagram</h6>
                                    <span class="text-secondary">{{ $elements->instagram }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg> Facebook</h6>
                                    <span class="text-secondary">{{ $elements->facebook }}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- Koniec wyswietlania --}}
                        <div class="card mt-3 editSocial">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{ $elements->twitter }}">
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20"
                                                rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ $elements->instagram }}">
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ $elements->facebook }}">
                                </li>
                            </ul>
                        </div>
                        {{-- Koniec edycji --}}
                    </div>
                    <div class="col-md-8">
                        @if (isset($switcher))
                            @if ($switcher)
                        <div class="card mb-3">
                            <div class="card-body2 card-body show">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $elements->firstname }} {{ $elements->lastname }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $elements->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $elements->phonenumber }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nickname</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $elements->nickname }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $elements->city }} {{ $elements->street }} {{ $elements->number }}
                                    </div>
                                </div>
                                <hr>
                                
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-info editProfile" type="button">Edit</button>
                                            </div>
                                        </div>
                                    
                            </div>
                            @endif
                                @endif
                            {{-- Koniec wyswietlania --}}
                            <div class="card-body2 card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="firstname"
                                            value="{{ $elements->firstname }}">
                                    </div>
                                    <div class="col-sm-9 text-secondary justify-content-end">
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ $elements->lastname }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $elements->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phonenumber"
                                            value="{{ $elements->phonenumber }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nickname</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nickname"
                                            value="{{ $elements->nickname }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="city"
                                            value="{{ $elements->city }}">
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="street"
                                            value="{{ $elements->street }}">
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="number"
                                            value="{{ $elements->number }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                            {{-- Koniec edycji --}}

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function(){
    $(".editProfile").click(function() {
        $($(this).parent().parent().parent()).removeClass("show");
        $($(this).parent().parent().parent().next()).addClass("show");
        $(".showSocial").css({
            'display': 'none'
        });
        $(".editSocial").css({
            'display': 'block'
        });
    });
    });
</script>
@endpush