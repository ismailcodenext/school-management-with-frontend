@extends('layout.master')
@section('title', 'Principals Message')
@section('content')
@include('components.front-end.components.topbar-section')
@include('components.front-end.components.branding-section')
@include('components.front-end.components.nav-section')
    @include('components.front-end.principals-message.principal-section')
    @include('components.front-end.components.footer-section')
@endsection