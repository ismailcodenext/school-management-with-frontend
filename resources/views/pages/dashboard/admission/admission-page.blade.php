@extends('layout.sidenav-layout')
@section('content')
    @include('components.admission.admission-list')
    @include('components.admission.admission-create')
{{--    @include('components.teacher.teacher-delete')--}}
{{--    @include('components.teacher.teacher-update')--}}
@endsection
