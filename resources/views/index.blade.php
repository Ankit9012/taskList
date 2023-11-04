<h1>Task List to do</h1>


@forelse ($tasks as $task)
    <a href="{{ route('task.show', ['id' => $task->id]) }}">
        <div>{{ $task->title }}</div>
    </a>    
@empty
    <h2>Relex! There is no task to be done</h2>
@endforelse
