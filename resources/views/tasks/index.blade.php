<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- {{--bootstrap css CDN--}} -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous">

    <style>
        .pagination {
            justify-content: center;
        }
        .pagination a {
            display:inline;
            padding: 0.5rem;
        }
    </style>

    <title>ToDo List</title>
</head>
<body>
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="row" style='margin-top: 1rem;'>
                <h1>Todo List</h1>
            </div>

            <!-- display success message -->
            @if (Session::has('success')) 
                <div class="alert alert-success">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif

            <!-- display error message -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif    

            <form action="{{ route('tasks.store')}}" method="Post">
            {{ csrf_field() }}
                <div class="row" style='margin-top: 1rem; margin-bottom: 1rem;'>
                    <div class="col-md-9">
                        <input type="text" name="newTaskName" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary btn-block" value="Add Task">
                    </div>
                </div>    
            </form>
            
            <!-- display stored tasks -->
            @if (count($storedTasks) > 0)
                <table class="table">
                    <tHead>
                        <th>Task No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tHead>

                    <tBody>
                        @foreach ($storedTasks as $storedTask)
                            <tr>
                                <th>{{ $storedTask->id }}</th>
                                <td>{{ $storedTask->name }}</td>

                                <!-- edit function -->
                                <td><a href="{{ route('tasks.edit', ['tasks'=>$storedTask->id]) }}" class="btn btn-outline-secondary">Edit</a></td>

                                <!-- delete function -->
                                <td>
                                    <form action="{{ route('tasks.destroy', ['tasks'=>$storedTask->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="Delete">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tBody>
                </table>
            @endif

            <div class="row">
                 {{ $storedTasks->links() }}
            </div>

        </div>
    </div>
    
    <!-- {{--bootstrap js CDN--}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
    crossorigin="anonymous"></script>
</body>
</html>
