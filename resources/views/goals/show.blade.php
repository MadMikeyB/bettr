@extends('layouts.master')

@section('content')
@hero(['title' => $goal->title, 'subtitle' => $goal->excerpt])
@endhero
@endsection
