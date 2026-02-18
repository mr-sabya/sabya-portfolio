@extends('frontend.layouts.app')

@section('title', 'Blog')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="Blog"
    pageSubTitle="Blog" />
<!-- breadcrumb -->

<!-- Blog Classic Area Start -->
<livewire:frontend.blog.index />
<!-- Blog Classic Area End -->

@endsection