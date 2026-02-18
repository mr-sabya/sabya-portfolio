@extends('frontend.layouts.app')

@section('title', 'Project Details')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="My Projects"
    pageSubTitle="My All Projects" />
<!-- breadcrumb -->


<!-- tmp Latest Portfolio Start -->
<livewire:frontend.project.show projectId="{{ $project->id }}" />
<!-- tmp Latest Portfolio end -->
@endsection