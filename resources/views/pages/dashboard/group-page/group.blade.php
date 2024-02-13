@extends('layout.sidenav-layout')
@section('title','Group Page')
@section('content')
    @include('components.group.group-create')
    @include('components.group.group-list')
    @include('components.group.group-update')
    @include('components.group.group-delete')
@endsection