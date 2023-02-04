@extends('layouts.app')

@section('content')
<x-header/>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>
                    <chat-index :dupa="{{ Auth::user() }}"></chat-index>
                    <div class="panel-body">
                        <chat-messages :dupa="{{ Auth::user() }}" :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <chat-form :idrec="{{$user}}" :user="{{ Auth::user() }}" :announcement="{{$announcement}}"></chat-form> 
@endsection
