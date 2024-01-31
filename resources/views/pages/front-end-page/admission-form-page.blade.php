@extends('layout.master')
@section('title', 'Admission Form')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.admission-form.admission')
    @include('components.front-end.components.footer-section')
    @endsection