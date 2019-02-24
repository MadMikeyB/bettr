@extends('layouts.master')

@push('styles-after')
<link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')

@hero(['title' => 'Create a new goal'])
@endhero

<div class="website">
    <div class="website__flex-container">
        <create-goal :user="{{auth()->id()}}"></create-goal>
    </div>
</div>
@endsection
