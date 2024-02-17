@extends('layout.sidenav-layout')
@section('content')
    @include('components.admission.admission-list')
    @include('components.admission.admission-create')
    @include('components.admission.admission-update')
   @include('components.admission.admission-delete')
@endsection
