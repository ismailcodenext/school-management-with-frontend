@extends('layout.sidenav-layout')
@section('content')
    @include('components.topbar.topbar-list')
    @include('components.topbar.topbar-delete')
    @include('components.topbar.topbar-create')
    @include('components.topbar.topbar-update')
@endsection