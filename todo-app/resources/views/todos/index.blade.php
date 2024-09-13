<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">To-Do List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('todos.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Add new todo" required>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>

        <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $todo->title }}
                    <div>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
