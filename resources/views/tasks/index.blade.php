@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>タスク一覧</h1>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <p>{{ $task->content }}</p>
                    <!-- 各タスクの詳細ページへのリンク -->
                    <a href="{{ route('tasks.show', $task->id) }}">詳細を表示</a>
                </li>
            @endforeach
        </ul>
        <!-- 新しいタスクを作成するページへのリンク -->
        <a href="{{ route('tasks.create') }}">新しいタスクを作成</a>
    </div>
@endsection