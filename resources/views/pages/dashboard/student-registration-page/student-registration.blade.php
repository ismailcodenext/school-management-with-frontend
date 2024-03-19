@extends('layout.sidenav-layout')
@section('title','Student Registration')
@section('content')
    @include('components.back-end.student-registration.student-registration-list')
    @include('components.back-end.student-registration.student-registration-create')
@endsection
