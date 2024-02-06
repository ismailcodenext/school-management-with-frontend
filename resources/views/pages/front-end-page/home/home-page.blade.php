@extends('layout.master')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.home-section.hero-section')
    @include('components.front-end.home-section.main-content')
    @include('components.front-end.components.footer-section')

@endsection