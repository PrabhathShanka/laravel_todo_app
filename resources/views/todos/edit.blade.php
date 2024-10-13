<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edut todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


    <!-- Create Todo Modal -->
    <div class="container">

        <div>

            <h5>Edit Todo</h5>

        </div>
        <div class="modal-body">
            <form action="{{ route('todo.update', $todos->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $todos->title }}"
                        required />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $todos->description }} </textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="work" {{ $todos->category == 'work' ? 'selected' : '' }}>Work</option>
                        <option value="study" {{ $todos->category == 'study' ? 'selected' : '' }}>Study</option>
                        <option value="entertainment" {{ $todos->category == 'entertainment' ? 'selected' : '' }}>
                            Entertainment</option>
                        <option value="family" {{ $todos->category == 'family' ? 'selected' : '' }}>Family</option>
                    </select>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="completed" name="completed"
                        {{ $todos->completed ? 'checked' : '' }} />
                    <label class="form-check-label" for="completed">Completed</label>
                </div>

                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
