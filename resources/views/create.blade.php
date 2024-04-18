@extends('layouts.app')

@section('content')
    <h1>タスク作成</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="content">内容:</label>
            <input type="text" id="content" name="content">
        </div>
        <button type="submit">作成</button>
    </form>
@endsection