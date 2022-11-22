<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Todo</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Todo</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>

            <form action="{{url('update-todo')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="mb-3">
                    <input type="text" name="todo" class="form-control" placeholder="Enter your todos" value="{{$data->todolist}}">
                    @error('todo')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <a href="{{url('todo-list')}}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
</body>
</html>