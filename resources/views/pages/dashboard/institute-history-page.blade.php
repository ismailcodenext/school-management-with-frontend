@extends('layout.sidenav-layout')
@section('content')
    @include('components.institute-history.institute-history-list')
    @include('components.institute-history.institute-history-delete')
    @include('components.institute-history.institute-history-create')
    @include('components.institute-history.institute-history-update')
@endsection
