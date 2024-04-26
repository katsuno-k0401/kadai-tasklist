@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>タスク詳細</h1>
    </div>
        <table class="table w-full my-4">
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>

    {{-- メッセージ編集ページへのリンク --}}
　　<a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">編集</a>
　　<form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('本当に削除しますか？')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">削除</button>
</form>
@endsection