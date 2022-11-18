@extends('layouts.app')

@section('content')
<x-header/>
    <chat-room :user="{{ Auth::user() }}"></chat-room>
@endsection