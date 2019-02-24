@extends('layouts.master')

@push('styles-after')
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')

@hero(['title' => $goal->title])
@endhero

<show-goal 
    :goal="{{$goal->load('user')}}" 
    :user="{{auth()->check() ? auth()->id() : 0}}" 
    :targets="{{json_encode($goal->targets)}}"
>    
</show-goal>
@endsection
