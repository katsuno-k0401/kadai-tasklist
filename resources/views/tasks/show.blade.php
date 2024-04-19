@section('content')
    <div class="container">
        <h1>タスク詳細</h1>
        <p>タスク内容: {{ $task->content }}</p>
        
        <!-- タスクを編集するページへのリンク -->
        <a href="{{ route('tasks.edit', $task->id) }}">編集</a>
    </div>
@endsection