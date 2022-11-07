@extends('layouts.app')

@section('content')
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


    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold">Chat</p>
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-body">
                            <chat-messages :dupa="{{ Auth::user() }}" :messages="messages"></chat-messages>
                            <div class="form-outline">
                                <chat-form v-on:messagesent="addMessage" :idrec="{{ $id }}" :user="{{ Auth::user() }}"></chat-form>                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
