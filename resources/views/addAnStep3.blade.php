@extends('layouts.app')

@section('content')
    <section style="background-color: #09284b;">
        <div class="container h-100 pt-5">
            <div class="formCard p-md-4" style="border-radius: 25px;">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('announcement.post.step.3') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-1 pt-2">
                                <a href="{{ route('announcement.create.step.2') }}"
                                    class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                            </div>
                            <div class="col-md-10">
                                <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 3</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-3 mb-5">Choose localization</p>
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
                                <input class="quiz_localization" type="button" value="Choose Location" onclick="Modal()">
                            </div>
                        </div>
                        <div class="col align-self-start">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-check-label" for="date1">Date since</label>
                                        <input type="date" id="date1" class="form-control" min="{{ date('Y-m-d') }}"
                                            name="date">
                                        <img
                                            src="https://img.freepik.com/free-vector/illustration-calendar-icon_53876-5588.jpg?w=826&t=st=1665699177~exp=1665699777~hmac=408590667928e396b0be3765548edc8c37629b7731797ef52e18b47b0d8c1f36">
                                        <div class="form-check">
                                            <input class="form-check-input" name="oneDay" id="oneDay" type="checkbox"
                                                onchange="dateDisabled()">
                                            <label class="form-check-label" for="oneDay">This day only</label>
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

                    <div class="row justify-content-end">
                        <button type="submit" class="quiz_continueBtn mt-5" style="max-width: 100%">Next</button>
                    </div>
                </form>
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
        </div>
        </div>
    </section>


@endsection
