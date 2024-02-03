@extends('layout.master')
@section('title', 'Institue Section')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.institute-gallary.institute-section')
    @include('components.front-end.components.footer-section')
    @endsection