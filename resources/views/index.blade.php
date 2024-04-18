@extends('layouts.app')

@section('content')
    <h1>タスク一覧</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->content }}</li>
        @endforeach
    </ul>
@endsection