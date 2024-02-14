@extends('layout.sidenav-layout')
@section('title','User Message')
@section('content')
    @include('components.usermessage.message-list')
    @include('components.usermessage.message-view')
    @include('components.usermessage.message-delete')
@endsection