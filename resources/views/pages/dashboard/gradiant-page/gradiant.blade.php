@extends('layout.sidenav-layout')
@section('title','Gradiant Page')
@section('content')
    @include('components.back-end.gradiant-info.gradiant-info-list')
    @include('components.back-end.gradiant-info.gradiant-info-create')
    @include('components.back-end.gradiant-info.gradiant-info-update')
    @include('components.back-end.gradiant-info.gradiant-info-delete')
@endsection