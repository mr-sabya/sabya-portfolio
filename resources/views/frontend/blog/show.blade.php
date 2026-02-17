@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="Blog"
    pageSubTitle="Blog" />
<!-- breadcrumb -->

<!-- Blog Classic Area Start -->
<livewire:frontend.blog.show blogId="{{ $blog->id }}" />
<!-- Blog Classic Area End -->

@endsection