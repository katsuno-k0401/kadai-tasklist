@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <h2 class="text-lg">タスク 一覧</h2>
    </div>
    　　@if (Auth::check())
    @if (isset($tasks))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>ユーザーiD</th>
                    <th>タスクiD</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->user_ID }}</td>
                    @if(Auth::check() && $task->user_ID === Auth::user()->id)
    <td><a class="link link-hover text-info" href="{{ route('tasks.show', $task->id) }}">{{ $task->id }}</a></td>
@else
    <td><a class="link link-hover text-info" href="{{ route('tasks.index') }}">{{ $task->id }}</a></td>
@endif
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

        <!-- 新しいタスクを作成するページへのリンク -->
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">タスクの新規作成</a>
        @endif
    </div>
@endsection