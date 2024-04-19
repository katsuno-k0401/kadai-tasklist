@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>タスク編集</h1>
        <!-- フォームを追加 -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">タスク内容</label>
                <input type="text" class="form-control" id="content" name="content" value="{{ $task->content }}">
            </div>
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
@endsection