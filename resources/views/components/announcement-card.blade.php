
<div>
@foreach ($announcements as $announcement)
        <div class="col-6 col-md-6 col-lg-4 mb-3">
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
                <h6 class="text-success">-</h6>
                <div class="d-flex flex-column mt-4">
                    <a class="btn btn-primary btn-sm"
                        href="{{ route('nicknameProfile', ['slug' => $announcement->userAnnouncement->slug]) }}">Creator
                        Details</a>
                    <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('indexChat',['user' => $announcement->userAnnouncement])}}">Poke</a>
                </div>
            </div>
        </div>
@endforeach
</div>