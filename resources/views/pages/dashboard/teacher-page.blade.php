@extends('layout.sidenav-layout')
@section('content')
    @include('components.teacher.teacher-list')
    @include('components.teacher.teacher-delete')
    @include('components.teacher.teacher-create')
    @include('components.teacher.teacher-update')
@endsection
