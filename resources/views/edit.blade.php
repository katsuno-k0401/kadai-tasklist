@extends('layouts.app')

@section('content')
    <h1>タスク編集</h1>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="content">内容:</label>
            <input type="text" id="content" name="content" value="{{ $task->content }}">
        </div>
        <button type="submit">更新</button>
    </form>
@endsection