@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2 pt-5">
        <div class="formCard">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-1 pt-2">
                        <a href="{{ route('index') }}" class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-md-10">
                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 1</p>                        
                    </div>                    
                </div> 
            </div>
            <div class="card-body">
                <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Choose category</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('announcement.post.step.1') }}" method="POST">
                    @csrf
                    <div class="container">
                    @foreach($categories->chunk(3) as $category)                        
                        <div class="row">
                            @foreach($category as $item)
                                <div class="col">  
                                    <div class="quiz_card_area">
                                        <input class="quiz_checkbox" type="checkbox" name="categoryCheck[]" id="{{ $item->id}}" value="{{ $item->id}}"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src={{ asset( $item->categoryIMG)}} />
                                                </div>        

                                                <div class="quiz_card_title">
                                                    <h4>{{ $item->categoryName}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            @endforeach                        
                        </div>
                    @endforeach       
                    
                    <div class="col-sm-12">
                        <div class="quiz_next">
                            <button class="quiz_continueBtn" type="submit">Continue</button>
                        </div>
                    </div>

                  </div>                  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 