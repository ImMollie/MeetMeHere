@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2 pt-5">
        <div class="formCard">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-1 pt-2">
                        <a href="{{ route('announcement.get.step.1') }}" class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-md-10">
                        <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 2</p>                        
                    </div>                    
                </div> 
            </div>
            <div class="card-body">
                <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Amount of people you want to envolved</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('announcement.post.step.2') }}" method="POST">
                    @csrf
                    <div class="container">                                                
                            <div class="row">                                
                                <div class="col">  
                                    <div class="quiz_card_area">
                                        <input class="quiz_checkbox" type="radio" name="amountPeople" id="1" value="1"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src="https://img.freepik.com/premium-vector/bearded-man-smiling-showing-thumbs-up-sign-guy-with-gesture-meaning-approval-okay-like_316839-1218.jpg?w=826" />
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
                                        <input class="quiz_checkbox" type="radio" name="amountPeople" id="2" value="2"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src="https://img.freepik.com/free-vector/happy-friendly-women-talking-outside-female-friends-accidental-meeting-flat-vector-illustration-communication-public-place_74855-13109.jpg?w=2000" />
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
                                        <input class="quiz_checkbox" type="radio" name="amountPeople" id="3" value="3"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src="https://img.freepik.com/darmowe-wektory/zbior-ludzi-patrzacych-w-gore_23-2148990806.jpg?t=st=1665581146~exp=1665581746~hmac=e663a7fcdb5f071bd7e6f41f354e74c804bd4b35adcc61b52ef5a37d2d09f4fe" />
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
                                        <input class="quiz_checkbox" type="radio" name="amountPeople" id="4" value="999"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src="https://img.freepik.com/free-vector/group-people-illustration-collection_52683-33805.jpg?w=1380&t=st=1665579718~exp=1665580318~hmac=8c0213d714b091380f965118dd63eb49e3e2b491fddcae956edfc676fcb9375d" />
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
                                        <input class="quiz_checkbox" type="radio" name="amountPeople" id="5" value="999"/>
                                        <div class="single_quiz_card">                                            
                                            <div class="quiz_card_content">

                                                <div class="quiz_card_icon">
                                                    <img src="https://img.freepik.com/free-vector/business-multinational-character-team-different-pose-diverse-office-worker-people-set-standing_90220-503.jpg?w=1380&t=st=1665580633~exp=1665581233~hmac=4270292ae9f32bced7b6e48d22371498bd6f5e552fc10f6f80d258c75a46f15b" />
                                                </div>        

                                                <div class="quiz_card_title">
                                                    <h4>>Any</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        
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