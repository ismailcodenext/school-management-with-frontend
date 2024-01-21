@extends('layout.sidenav-layout')
@section('content')
    @include('components.branding.branding-list')
    @include('components.branding.branding-delete')
    @include('components.branding.branding-create')
    @include('components.branding.branding-update')
@endsection