<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Todo List</h2>

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div style="margin-right: 10%; float:right;">
                    <a href="{{url('add-todo')}}" class="btn btn-primary">Add your todos</a>
                </div>
            </div>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Todo List</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @php
                        $i = 1;
                    @endphp 

                    @foreach($data as $todo)
                    <th scope="row">{{$i++}}</th>
                    <td>{{$todo->todolist}}</td>
                    <td><a href="{{url('edit-todo/'.$todo->id)}}" class="btn btn-primary">Edit</a> <a href="{{url('delete-todo/'.$todo->id)}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</body>
</html>