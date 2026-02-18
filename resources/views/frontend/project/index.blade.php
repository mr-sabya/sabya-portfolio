@extends('frontend.layouts.app')

@section('title', 'My Projects')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="My Projects"
    pageSubTitle="My All Projects" />
<!-- breadcrumb -->


<!-- tmp Latest Portfolio Start -->
<livewire:frontend.project.index />
<!-- tmp Latest Portfolio end -->
@endsection