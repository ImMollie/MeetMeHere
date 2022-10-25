@extends('layouts.app')

@section('content')
    <section style="background-color: #09284b;">
        <div class="container h-100">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-4">
                    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-2 mt-1">Announcements</p>
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            @foreach ($announcements as $announcement)
                                <div class="row p-2 bg-white border rounded">

                                    <div class="col-md-3 mt-1">
                                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($announcement->categoryOfAnnouncement2 as $item)
                                                    @if ($loop->iteration == 1)
                                                        <div class="carousel-item active">
                                                            <img src="{{ $item->categoryAnnouncement->categoryIMG }}"
                                                                class="d-block w-100" alt="...">
                                                        </div>
                                                    @else
                                                        <div class="carousel-item">
                                                            <img src="{{ $item->categoryAnnouncement->categoryIMG }}"
                                                                class="d-block w-100" alt="...">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <h5>
                                            @foreach ($announcement->categoryOfAnnouncement2 as $item)
                                                {{ $item->categoryAnnouncement->categoryName }}
                                            @endforeach
                                        </h5>
                                        <div class="d-flex flex-row">
                                            <div class="ratings mr-2">
                                                <i class="fa fa-star">
                                                </i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div><span>310</span>
                                        </div>
                                        <div class="mt-1 mb-1 spec-1">
                                            <span>Localization:</span>
                                            <span class="dot"></span><span>{{ $announcement->place }}</span>

                                            <div class="mt-1 mb-1 spec-1">
                                                <span>Amount of people needed:</span>
                                                <span class="dot"></span><span>{{ $announcement->amountPeople }}</span>
                                            </div>
                                            <p class="text-justify text-truncate para mb-0">
                                                {{ $announcement->description }}<br><br></p>
                                        </div>
                                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                            <div class="d-flex flex-row align-items-center">
                                                <h4 class="mr-1">{{ $announcement->date1 }}</h4><span
                                                    class="strike-text">{{ $announcement->date2 }}</span>
                                            </div>
                                            <h6 class="text-success">Free shipping</h6>
                                            <div class="d-flex flex-column mt-4">
                                                <a class="btn btn-primary btn-sm" href="{{ route('nicknameProfile',['slug'=> $announcement->userAnnouncement->slug]) }}">Creator Details</a>
                                                <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
