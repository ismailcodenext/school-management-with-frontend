@extends('layout.sidenav-layout')
@section('content')
    @include('components.photo-gallery.photo-gallery-list')
    @include('components.photo-gallery.photo-gallery-create')
    @include('components.photo-gallery.photo-gallery-delete')
    @include('components.photo-gallery.photo-gallery-update')

@endsection
