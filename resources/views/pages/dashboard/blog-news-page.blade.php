@extends('layout.sidenav-layout')
@section('content')
    @include('components.blog-news.blog-news-list')
    @include('components.blog-news.blog-news-create')
{{--    @include('components.photo-gallery.photo-gallery-delete')--}}
{{--    @include('components.photo-gallery.photo-gallery-update')--}}

@endsection
