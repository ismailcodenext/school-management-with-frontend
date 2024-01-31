@extends('layout.master')
@section('title', 'Contact Us')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.contact-section.contact')
    @include('components.front-end.components.footer-section')
    @endsection