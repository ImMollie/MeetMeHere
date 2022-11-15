@extends('layouts.app')

@section('content')
<x-header/>
    <section>
        <div class="container pt-5 card text-black h-100 mt-5 mb-5" style="border-radius: 25px;">
            <div class="row">
                <div class="col-md-8 order-md-2 col-lg-9">
                    <div class="container-fluid">
                        <div class="row   mb-5">
                            <div class="col-12">
                                <div class="dropdown text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                                    <label class="mr-2">Sort by:</label>
                                    <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Relevance <span
                                            class="caret"></span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start"
                                        style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#">Price Descending</a>
                                        <a class="dropdown-item" href="#">Price Ascending</a>
                                        <a class="dropdown-item" href="#">Best Selling</a>
                                    </div>
                                </div>
                                <div class="btn-group float-md-right ml-3">
                                    <button type="button" class="btn btn-lg btn-light"> <span
                                            class="fa fa-arrow-left"></span> </button>
                                    <button type="button" class="btn btn-lg btn-light"> <span
                                            class="fa fa-arrow-right"></span> </button>
                                </div>
                                <div class="dropdown float-right">
                                    <label class="mr-2">View:</label>
                                    <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">9 <span class="caret"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                        x-placement="bottom-end"
                                        style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                        <a class="dropdown-item" href="#">12</a>
                                        <a class="dropdown-item" href="#">24</a>
                                        <a class="dropdown-item" href="#">48</a>
                                        <a class="dropdown-item" href="#">96</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <x-announcement-card :announcements="$announcements" />
                        </div>
                        {{-- <div class="row sorting mb-5 mt-5">
                            {!! $announcements->links() !!}
                        </div> --}}
                    </div>
                </div>                
                <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                    <h3 class="mt-0 mb-5">Showing <span class="text-primary">12</span> Products</h3>
                    <h6 class="text-uppercase font-weight-bold mb-3">Categories</h6>
                    @foreach($categories as $category)
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="{{ $category->id }}" class="custom-control-input category" id="category{{ $category->id }}">
                            <label class="custom-control-label" for="{{ $category->id }}"> {{ $category->categoryName }} </label>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                    <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Amount people</h6>
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filter-size-1">
                            <label class="custom-control-label" for="filter-size-1">1</label>
                        </div>
                    </div>
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filter-size-2">
                            <label class="custom-control-label" for="filter-size-2">2</label>
                        </div>
                    </div>
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filter-size-3">
                            <label class="custom-control-label" for="filter-size-3">3 and more</label>
                        </div>
                    </div>
                    <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                    <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Radius</h6>
                    <div class="filter-content collapse" id="collapse_aside2" style="">
                        <div class="card-body">
                            <input type="range" class="custom-range" min="0" max="100" name="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input class="form-control" placeholder="$0" type="number">
                                </div>
                                <div class="form-group text-right col-md-6">
                                    <label>Max</label>
                                    <input class="form-control" placeholder="$1,0000" type="number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                    <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Date</h6>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-check-label" for="date1">Date since</label>
                                <input type="date" id="date1" class="form-control" min="{{ date('Y-m-d') }}"
                                    name="date">
                                <div class="form-check">
                                    <input class="form-check-input" name="oneDay" id="oneDay" type="checkbox"
                                        onchange="dateDisabled()">
                                    <label class="form-check-label" for="oneDay">This day only</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-check-label" for="date2">Date for</label>
                            <input type="date" id="date2" class="form-control oneDay" min="{{ date('Y-m-d') }}"
                                name="date2">
                        </div>
                    </div>
                    <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                    <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Place</h6>
                    <div class="form-group">
                        <input type="text" id="address" class="form-control" name="address" placeholder="Address"
                            readonly>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input class="quiz_localization" type="button" value="Choose Location" onclick="Modal()">
                    </div>
                    <div class="modal fade" id="location-modal" tab-index="-1" role="dialog"
                        aria-labelled="location-modal" aria-hidden="true">
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
