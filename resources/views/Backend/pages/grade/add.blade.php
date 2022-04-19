@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Add Grade Here</h2>
    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif

<hr>
<div class="col-md-6">
    <form action="" method="POST" class="form-group">
        @csrf
        <div class="form-group">
            <label for="">Grade Title</label>
            <input type="text" class="form-control" name="title" placeholder="Eg. Nursary, Grade 1, Grade 2 etc.">  
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
          </div>

          <div class="form-group">
              <button class="btn btn-info">Add</button>
          </div>
    </form>
</div>
</div>

@endsection