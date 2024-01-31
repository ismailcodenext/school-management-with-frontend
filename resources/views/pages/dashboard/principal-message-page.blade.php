@extends('layout.sidenav-layout')
@section('content')
    @include('components.principal-message.principal-message-list')
    @include('components.principal-message.principal-message-delete')
    @include('components.principal-message.principal-message-create')
{{--    @include('components.teacher.teacher-update')--}}
@endsection
