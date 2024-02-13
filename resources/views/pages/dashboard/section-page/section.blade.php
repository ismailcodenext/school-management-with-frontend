@extends('layout.sidenav-layout')
@section('title','Section Page')
@section('content')
    @include('components.section.section-create')
    @include('components.section.section-list')
    @include('components.section.section-update')
    @include('components.section.section-delete')
@endsection