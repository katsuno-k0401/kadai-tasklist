@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>タスク作成</h1>
        <!-- フォームを追加 -->
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">タスク内容</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
@endsection
@endsection