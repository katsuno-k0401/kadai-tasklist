@extends('layouts.app')

@section('content')
    <h1>タスク詳細</h1>
    <p>タスク内容: {{ $task->content }}</p>
@endsection