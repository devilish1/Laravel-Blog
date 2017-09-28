<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>
    <p>List of tasks</p>
    <ul>

       @foreach ($tasks as $task)
        <li><a href="/tasks/{{$task->id}}">{{$task->body}}</a></li>
    @endforeach
    </ul>
{{-- <h2>Hello {{$name}}</h2> --}}
</body>
</html>

