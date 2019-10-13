@extends('layout')


@section('content')
    
    <div class="row">
        <div class="form-group ">
           
           <form action="/create/todo" method="POST">
            @csrf
                <div class="input-group">
                <span class="input-group-addon">Enter Task</span>
                <input type = "text"
                        class="form-control"
                        name="todo"
                        placeholder="Create New Task">
                </div>
           </form>
        </div>


    </div>
    <br>
    <hr>
    
    <div>
    
   
        @foreach($todos as $todos)

           <h3 class="text-info"> {{ $todos->todo }} </h3>

                @if(!$todos->completed)

                    <a href="{{ route('todos.completed', [ 'id' => $todos->id ]) }}" class="btn btn-xs btn-info" > Mark Complated </a>

                @else
                
                    <span class="label label-default">Completed</span>    

                @endif

                <a href="{{ route('todo.update', [ 'id' => $todos->id ]) }}" class="btn btn-xs btn-success" > Update </a> 
                
                <a href="{{ route('todo.delete', [ 'id' => $todos->id ]) }}" class="btn btn-xs btn-danger" > Delete </a>
                
                <hr>

        @endforeach

    </div>
@stop

