
<div class="row text-center">
    <div>
        @if( !is_array($announcements))
            <h3 class="mt-0 mb-3">{{__('translation.searchAnnouncement.announcements')}}</h3><h5>{{__('translation.searchAnnouncement.showing')}} <span class="text-primary">{{ $announcements->count() }}</span></h5>
            @else
            <h3 class="mt-0 mb-3">{{__('translation.searchAnnouncement.announcements')}}</h3><h5>{{__('translation.searchAnnouncement.showing')}} <span class="text-primary">{{ count($announcements) }}</span></h5>
        @endif
    </div>
</div>
@foreach ($announcements as $announcement)
    <div class="col-sm-6 col-lg-5 m-2 box"> 
        <div class="d-flex flex-column mt-1 text-center detail-box2">
            <h5>
                @foreach ($announcement->categoryOfAnnouncement2 as $item)
                    {{ __($item->categoryAnnouncement->categoryName) }}<br>
                @endforeach
            </h5>
            <div class="mt-1 mb-1 text-center">
                <span>Localization:</span>
                <span class="dot"></span><span>{{ $announcement->place }}</span>
                <div class="mt-1 mb-3 ">
                    <span>{{__('translation.searchAnnouncement.amount')}}</span>
                    @if ($announcement->currentPeople != null)
                        <span
                            class="dot"></span><span>{{ $announcement->amountPeople - $announcement->currentPeople }}</span>
                    @else
                        <span class="dot"></span><span>{{ $announcement->amountPeople }}</span>
                    @endif
                </div>
                <div class="d-flex img-box">
                    <div id="carouselExampleSlidesOnly" class="carousel slide d-flex" data-bs-ride="carousel">
                        <div class="carousel-inner ">
                            @foreach ($announcement->categoryOfAnnouncement2 as $item)
                                @if ($loop->iteration == 1)
                                    <div class="carousel-item active">
                                        <img src="{{ $item->categoryAnnouncement->categoryIMG }}" class=""
                                            style="object-fit: scale-down; width: 240px; height: 200px;" alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ $item->categoryAnnouncement->categoryIMG }}" class=""
                                            style="object-fit: scale-down; width: 240px; height: 200px;" alt="...">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>                
                @if($creatordetails)
                <div class="d-flex justify-content-center mt-2 mb-2">
                    <a class="btn btn-primary btn-sm" style="background-color: #ffbe33; border-color: black; color: black;" href="{{ route('nicknameProfile', ['slug' => $announcement->userAnnouncement->slug]) }}">
                        {{__('translation.searchAnnouncement.buttons.creator')}}</a>
                </div>
                @endif
                <p class="text-justify text-wrap para mb-0">
                    {{ $announcement->description }}<br><br></p>
            </div>
            <div class="align-items-center align-content-center border-left mt-1">
                <div class="text-center">
                    <p>{{ $announcement->date }}</p>
                    <p>{{ $announcement->date2 }}</p>
                </div>
            </div>
            @if($poke)
            <div class="user_option justify-content-center mt-auto">
                <a class="login_button mt-auto" style="color: black;" href="{{ route('indexChat', ['user' => $announcement->userAnnouncement, 'announcement' => $announcement->id]) }}">Poke</a>
            </div>
            @endif
            @if($dismiss)
            <div class="user_option justify-content-center mt-auto">
                <a class="login_button mt-auto" style="color: black;" href="{{ route('dismiss', ['id' => $announcement->id]) }}">Dismiss</a>
            </div>
            @endif
            @if($cancel)
            <div class="user_option justify-content-center mt-auto">
                <a class="login_button mt-auto" style="color: black;" href="{{ route('cancel', ['id' => $announcement->id]) }}">Cancel</a>
            </div>
            @endif
            @if($refresh)
            <div class="user_option justify-content-center mt-auto">
                <a class="login_button mt-auto" style="color: black;" href="{{ route('refresh', ['id' => $announcement->id]) }}">Refresh</a>
            </div>
            @endif
        </div>
    </div>
@endforeach
