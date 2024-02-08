@extends('layout.sidenav-layout')
@section('content')
    @include('components.hero-slider.hero-slider-list')
    @include('components.hero-slider.hero-slider-create')
    @include('components.hero-slider.hero-slider-delete')
    @include('components.hero-slider.hero-slider-update')

@endsection
