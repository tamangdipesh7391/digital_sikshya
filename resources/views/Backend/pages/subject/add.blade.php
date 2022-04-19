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
            <label for="">Subject Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Eg. English, Nepali, Maths etc.">  
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
          </div>

          <div class="form-group">
              <label for="">Grade</label>
              <select name="grade" id="" class="form-control">
                  <option selected disabled>Select Grade</option>
                  @foreach($grades as $grade)
                  <option
                  @if(old('grade') == $grade->id)
                  {{ "selected" }}
                  @endif
                  value="{{$grade->id}}">{{$grade->title}}</option>
                  @endforeach
              </select>
              <a style="color: red">
                @error('grade')
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