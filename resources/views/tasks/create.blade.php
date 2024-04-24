@extends('layouts.app')

@section('content')

    <div class="prose ml-4">

        <h1>タスクの新規作成</h1>

        <!-- フォームを追加 -->
　　　　<div class="flex justify-center">
        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

　　　　　　<div class="form-control my-4">
                <label for="content">タスク:</label>
                <input type="text" class="input input-bordered w-full"style="width: 512px;" id="content" name="content" value="{{ isset($task) ? $task->content : '' }}" required>
                @if ($errors->has('content'))
            <div class="alert alert-danger mt-2">{{ $errors->first('content') }}</div>
            @endif
            </div>

            <div class="form-control my-4">
                <label for="status">ステータス:</label>
                <input type="text" class="input input-bordered w-full"style="width: 512px;" id="status" name="status" value="{{ isset($task) ? $task->status : '' }}" required>
                   @if ($errors->has('status'))
            <div class="alert alert-danger mt-2">{{ $errors->first('status') }}</div>
            @endif
                
            </div>


            <button type="submit" class="btn btn-primary">作成する</button>

        </form>

    </div>
 </div>
@endsection