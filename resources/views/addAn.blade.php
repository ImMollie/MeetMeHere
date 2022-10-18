@extends('layouts.app')

@section('content')
    <section style="background-color: #09284b; height:100%;">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center pt-5 pb-5">
                <div class="col-lg-2 col-xl-13">
                    <div class="formCard text-black h-100" style="border-radius: 25px;">
                        <div class="card-body p-md-4">
                            <div class="card1">
                                <ul id="progress-bar" class="text-center">
                                    <li class="active step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                </ul>
                                <h6>Step 1</h6>
                                <h6>Step 2</h6>
                                <h6>Step 3</h6>
                                <h6>Step 4</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-xl-13">
                    <div class="formCard text-black" style="border-radius: 25px;">
                        <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <!-- Poczatek -->
                        <div class="card2 step1 show">
                            <div class="card-header">
                                <div class="row">
                                    <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                    <div class="col">
                                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 1</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-md-4">
                                <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Choose category</p>
                                <div class="container">
                                    @foreach ($categories->chunk(3) as $category)
                                        <div class="row">
                                            @foreach ($category as $item)
                                                <div class="col">
                                                    <div class="quiz_card_area">
                                                        <input class="quiz_checkbox" type="checkbox" name="categoryCheck[]"
                                                            id="{{ $item->id }}" value="{{ $item->id }}" />
                                                        <div class="single_quiz_card">
                                                            <div class="quiz_card_content">
                                                                <div class="quiz_card_icon">
                                                                    <img src={{ asset($item->categoryIMG) }} />
                                                                </div>
                                                                <div class="quiz_card_title">
                                                                    <h4>{{ $item->categoryName }}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="quiz_next">
                                <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                            </div>
                        </div>
                        <!-- Koniec ekranu powitalnego -->

                        <!-- Początek ekranu drugiego -->
                        <div class="card2">
                            <div class="card-header">
                                <div class="row">
                                    <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                    <div class="col">
                                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 2</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-md-4">
                                <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Amount of people you want to
                                    envolved</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                    id="1" value="1" />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">
                                                        <div class="quiz_card_icon">
                                                            <img
                                                                src="https://img.freepik.com/premium-vector/bearded-man-smiling-showing-thumbs-up-sign-guy-with-gesture-meaning-approval-okay-like_316839-1218.jpg?w=826" />
                                                        </div>
                                                        <div class="quiz_card_title">
                                                            <h4>1</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                    id="2" value="2" />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">

                                                        <div class="quiz_card_icon">
                                                            <img
                                                                src="https://img.freepik.com/free-vector/happy-friendly-women-talking-outside-female-friends-accidental-meeting-flat-vector-illustration-communication-public-place_74855-13109.jpg?w=2000" />
                                                        </div>

                                                        <div class="quiz_card_title">
                                                            <h4>2</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                    id="3" value="3" />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">
                                                        <div class="quiz_card_icon">
                                                            <img
                                                                src="https://img.freepik.com/darmowe-wektory/zbior-ludzi-patrzacych-w-gore_23-2148990806.jpg?t=st=1665581146~exp=1665581746~hmac=e663a7fcdb5f071bd7e6f41f354e74c804bd4b35adcc61b52ef5a37d2d09f4fe" />
                                                        </div>
                                                        <div class="quiz_card_title">
                                                            <h4>3</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                    id="4" value="999" />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">

                                                        <div class="quiz_card_icon">
                                                            <img
                                                                src="https://img.freepik.com/free-vector/group-people-illustration-collection_52683-33805.jpg?w=1380&t=st=1665579718~exp=1665580318~hmac=8c0213d714b091380f965118dd63eb49e3e2b491fddcae956edfc676fcb9375d" />
                                                        </div>

                                                        <div class="quiz_card_title">
                                                            <h4>>More than 3</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                    id="5" value="999" />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">

                                                        <div class="quiz_card_icon">
                                                            <img
                                                                src="https://img.freepik.com/free-vector/business-multinational-character-team-different-pose-diverse-office-worker-people-set-standing_90220-503.jpg?w=1380&t=st=1665580633~exp=1665581233~hmac=4270292ae9f32bced7b6e48d22371498bd6f5e552fc10f6f80d258c75a46f15b" />
                                                        </div>

                                                        <div class="quiz_card_title">
                                                            <h4>>Any</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quiz_next">
                                <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                            </div>

                        </div>
                        <!-- Koniec ekranu drugiego -->

                        <!-- Początek ekranu trzeciego -->
                        <div class="card2">
                            <div class="card-header">
                                <div class="row">
                                    <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                    <div class="col">
                                        <p class="text-center h2 fw-bold mb-2 mx-1 mx-md-2 mt-1">Step 3</p>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body p-md-4">                                
                                <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Choose localization</p>
                                <div class="row">
                                    <div class="col" style="border-right: 5px dotted #bbb; border-radius:5px;">

                                        <div class="form-group">
                                            <img src="https://img.freepik.com/free-vector/tiny-people-using-mobile-application-with-map-outdoors_74855-7881.jpg?w=1380&t=st=1665697832~exp=1665698432~hmac=809399f6cc1eaaa8f3c82f2a40e4627249dddf79eaf1ea3fabe27128796b9b35"
                                                class="img-fluid" alt="Sample image">
                                            <input type="text" id="address" class="form-control" name="address"
                                                placeholder="Address" readonly>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longitude" name="longitude">
                                            <input class="quiz_localization" type="button" value="Choose Location"
                                                onclick="Modal()">
                                        </div>
                                    </div>
                                    <div class="col align-self-start">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="date1">Date since</label>
                                                    <input type="date" id="date1" class="form-control"
                                                        min="{{ date('Y-m-d') }}" name="date">
                                                    <img
                                                        src="https://img.freepik.com/free-vector/illustration-calendar-icon_53876-5588.jpg?w=826&t=st=1665699177~exp=1665699777~hmac=408590667928e396b0be3765548edc8c37629b7731797ef52e18b47b0d8c1f36">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="oneDay" id="oneDay"
                                                            type="checkbox" onchange="dateDisabled()">
                                                        <label class="form-check-label" for="oneDay">This day
                                                            only</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-check-label" for="date2">Date for</label>
                                                <input type="date" id="date2" class="form-control oneDay"
                                                    min="{{ date('Y-m-d') }}" name="date2">
                                                <img
                                                    src="https://img.freepik.com/free-vector/illustration-calendar-icon_53876-5588.jpg?w=826&t=st=1665699177~exp=1665699777~hmac=408590667928e396b0be3765548edc8c37629b7731797ef52e18b47b0d8c1f36">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quiz_next">
                                <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                            </div>
                        </div>
                        <!-- Koniec ekranu trzeciego -->

                        <!-- Początek ekranu czwartego -->                        
                        <div class="card2">
                            <div class="card-header">
                                <div class="row">
                                    <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                    <div class="col">
                                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 4</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-md-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Describe your meeting!</p>
                                        <p class="text-center h4 mb-3 mx-1 mx-md-2 mt-1">Again remember about this: and
                                            this: XD</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="p-3">
                                        <textarea id="address" class="form-control" name="description" placeholder="Describe it..." rows="13"
                                            cols="45"></textarea>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="row justify-content-center mb-3">
                                <button type="submit" class="quiz_continueBtn mt-5">Finish</button>
                            </div>
                        </div>
                        <!-- Koniec ekranu czwartego -->
                        </form>
                    </div>
                    <!--FormCard styling formy koniec  -->
                </div> <!-- Kolumna prawa koniec -->
            </div>
                <div class="modal fade" id="location-modal" tab-index="-1" role="dialog" aria-labelled="location-modal"
                aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="address-label">Choose Location</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div id="map"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i
                                        class="fa fa-check"></i>Done</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
