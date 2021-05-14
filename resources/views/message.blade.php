@extends('master')

@section('title', $message->title)

@section('content')
<br />
<h3>{{ $message->title }}</h3>
<p>{{ $message->content }}</p>

@endsection
