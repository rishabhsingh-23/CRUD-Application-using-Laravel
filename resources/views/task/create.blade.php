<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Task-Manager</title>
</head>
<body>
  <div class="container">
      <div class="row mt-5">
          <div class="col-md-6 mx-auto">
          @if(session('success'))
          <div class="alert alert-success">{{ session('success')}}</div>
          @endif
            <form action="{{ route('task.store')}}" method="post" class="form-group">
            @csrf
            <label for="name" class="form-label" >Create New Task</label>
            <input type="text" name="name" id="name" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
          </div>
      </div>
  </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>