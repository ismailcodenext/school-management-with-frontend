@extends('layout.sidenav-layout')
@section('content')
    @include('components.blog-news.blog-news-list')
    @include('components.blog-news.blog-news-create')
    @include('components.blog-news.blog-news-delete')
    @include('components.blog-news.blog-news-update')


@endsection
