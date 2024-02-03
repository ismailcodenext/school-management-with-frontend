@extends('layout.master')
@section('title', 'Teaher Information')
@section('content')
@include('components.front-end.components.topbar-section')
@include('components.front-end.components.branding-section')
@include('components.front-end.components.nav-section')
    @include('components.front-end.teacher-information.teacher-section')
    @include('components.front-end.components.footer-section')
@endsection