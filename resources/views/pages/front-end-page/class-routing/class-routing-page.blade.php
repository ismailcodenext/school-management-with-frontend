@extends('layout.master')
@section('title', 'Class Routing')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.classrouting-section.routing')
    @include('components.front-end.components.footer-section')
    @endsection