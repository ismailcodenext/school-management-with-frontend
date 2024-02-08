@extends('layout.master')
@section('title', 'Notice Section')
@section('content')
    @include('components.front-end.components.topbar-section')
    @include('components.front-end.components.branding-section')
    @include('components.front-end.components.nav-section')
    @include('components.front-end.notice-page.notice-section')
    @include('components.front-end.components.footer-section')
    @endsection