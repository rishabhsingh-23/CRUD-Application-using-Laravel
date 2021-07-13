
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div>

          <div class="p-5 bg-white shadow rounded">
            <div>
              @if (session('success'))
              <div class="alert alert-success">{{session('success')}}</div>
                  
              @elseif(session('error'))
              <div class="alert alert-danger">{{session('error')}}</div>
              @else
                  
              @endif
            </div>
            


            <form action="{{ route('task.store')}}" method="post" class="form-group">
              @csrf
              <label for="name" class="form-label" >Create New Task</label>
              <div class="row g-2">
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="">
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}

                  </div>
                      
                  @enderror
                </div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
                
              </div>
              
              </form>

              <div>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Task</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tasks as $task)
                  <tr>
                       <td>
                          {{ $task->id }}
                       </td>
   
                       <td>
                       {{ $task->name }}
                       </td>
   
                       <td>
                          <form action="{{ route('task.destroy',  $task->id )}}" method="POST">
                               @method('DELETE')
                               @csrf
                               <button class="btn btn-danger btn-sm">DELETE</button>
                          </form>
                       </td>
                       <td>
                         <a href="{{ route('task.edit', $task->id)}}">
                           <button class="btn btn-warning text-white btn-sm">Edit</button>
                         </a>
   
                       </td>
                 
                     </tr>
                  @endforeach
                     
                  </tbody>
   
               </table>
               <div class="d-flex justify-content-center">
                 {{$tasks->links('vendor.pagination.bootstrap-4')}}
               </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

