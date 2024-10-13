<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <!-- Home Page -->
        <div class="row">
            <div class="col-md-4">
                <h5>todo</h5>
                <ul class="list-group">
                    <li class="list-group-item" onclick="filterTodos('work')">
                        <span class="tag bg-primary"></span> Work
                    </li>
                    <li class="list-group-item" onclick="filterTodos('study')">
                        <span class="tag bg-info"></span> Study
                    </li>
                    <li class="list-group-item" onclick="filterTodos('entertainment')">
                        <span class="tag bg-warning"></span> Entertainment
                    </li>
                    <li class="list-group-item" onclick="filterTodos('family')">
                        <span class="tag bg-danger"></span> Family
                    </li>
                    <li class="list-group-item" onclick="filterTodos('all')">
                        <span class="tag bg-secondary"></span> Show All
                    </li>
                </ul>

                <a href="{{ route('todos.create') }}" class="btn btn-primary m-3 Add-button">Add Todo</a>
            </div>

            <div class="col-md-8" id="todoList">

                @foreach ($todos as $todo)
                    <div class="card todo-card" data-category="{{ $todo->category }}">
                        <div class="card-body">
                            <h6 class="task-title">{{ $todo->title }}</h6>
                            <p>{{ $todo->description }}</p>



                            <div class="done-checkbox">
                                <input type="checkbox" {{ $todo->completed ? 'checked' : '' }} disabled
                                    id="customCheckbox" />
                                <label for="customCheckbox">Done</label>
                            </div>

                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="circle"></div>
                                </div>
                                <div class="col-lg-9"></div>





                                <div class="col-lg-1">
                                    <a href="{{ route('todo.delete', $todo->id) }}"
                                        class="btn btn-danger btn-sm float-end ml-2">Delete</a>
                                </div>
                                <div class="col-lg-1">
                                    <a href="{{ route('todo.edit', $todo->id) }}"
                                        class="btn btn-info btn-sm float-end ml-2">EDIT</a>
                                </div>




                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function filterTodos(category) {
            const colorMapping = {
                work: '#7d3c98',
                study: '#2874a6',
                entertainment: '#d54242',
                family: '#2ecc71'
            };

            document.querySelectorAll('.todo-card').forEach(function(card) {
                const circle = card.querySelector('.circle');
                if (category === 'all') {
                    // cards and circle color edit
                    card.style.display = 'block';
                    const cardCategory = card.getAttribute('data-category');
                    circle.style.backgroundColor = colorMapping[cardCategory];
                } else if (card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                    circle.style.backgroundColor = colorMapping[category];
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

    <script>
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }
        }, 2000); // milliseconds
    </script>

</body>

</html>
