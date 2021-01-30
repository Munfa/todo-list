<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- {{--bootstrap css CDN--}} -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
    crossorigin="anonymous">
  
    <!-- {{--bootstrap js CDN--}} -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
    crossorigin="anonymous"></script>

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

            <div class="row">    
                <form action="{{ route('tasks.update', [$taskUnderEdit->id]) }}" method="POST" class="col-md-12">
                {{ csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <input type="text" name="updatedTaskName" class="form-control input-lg" value="{{ $taskUnderEdit->name }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save Changes" class="btn btn-outline-success btn-lg">
                        <a href="{{route('tasks.index')}}" class="btn btn-outline-danger btn-lg float-right">Go Back</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
