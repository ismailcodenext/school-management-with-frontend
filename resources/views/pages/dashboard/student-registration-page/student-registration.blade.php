@extends('layout.sidenav-layout')
@section('title','Student Registration')
@section('content')
    @include('components.back-end.student-registration.student-registration-list')
    @include('components.back-end.student-registration.student-registration-create')
    @include('components.back-end.student-registration.student-registration-update')
    @include('components.back-end.student-registration.student-registration-delete')
@endsection
