@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Edit GradeData</h2>
    
<hr>
<div class="col-md-6">
    <form action="{{route('edit-subject',$singleSubjectData->id )}}" method="POST" class="form-group">
        @csrf
        <div class="form-group">
            <label for="">Subject Title</label>
            <input type="text" class="form-control" name="title" value="{{$singleSubjectData->title}}">  
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
          </div>

          <div class="form-group">
              <label for="">Grade</label>
              <select name="grade" id="" class="form-control">
                 
                  @foreach($grades as $grade)
                  <option
                  
                  @if ($singleSubjectData->grade == $grade->id)
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