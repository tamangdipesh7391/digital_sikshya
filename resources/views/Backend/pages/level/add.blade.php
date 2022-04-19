@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Add Subject Level Here</h2>
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
            <label for="">Subject Level Title</label>
            <input type="text" class="form-control" name="title" placeholder="Eg. Basics, Medium, Advance etc.">  
            @if(!isset($singlelevelData))
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
            @endif
          </div>

          <div class="form-group">
              <button class="btn btn-info">Add</button>
          </div>
    </form>
</div>
<hr>
<div class="col-md-12">
    <h2><i class="fa fa-lists"></i> Subject Level Lists</h2>
    @if($levelData->count()>0)
    
    <table class="table table-bordered table-hover">
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

      
        @foreach ($levelData as $key => $item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>
                    @if(isset($singlelevelData) && $singlelevelData->id == $item->id)
                    <form action="{{route('edit-level',$singlelevelData->id)}}" method="POST">
                         @csrf
                         <div class="row">
                         <div class="form-group">
                              <input type="text" class="form-control " name="title" value="{{$singlelevelData->title}}">
                              <a style="color: red">
                                   @error('title')
                                        {{$message}}
                                   @enderror
                                    </a>
                         </div>
                         <div class="form-group">
                              <button class="btn ml-1 btn-info">Update</button>
                         </div>
                         </div>
                    </form>
                    @else
                   <a href="{{route('add-subjectlevel',$item->id)}}"> {{$item->title}}</a>

                    @endif
                </td>
                    <td>
                        <form action="{{route('level-status')}}" method="post">
                            @csrf
                            <input type="hidden" name="criteria" value="{{$item->id}}">
                       @if ($item->status ==1)
                       <button  style="color:green;all:none" name="active"><i class="fa fa-2x fa-check-circle"></i></button>
                      
                       @else

                       <button style="color:red" name="inactive"><i class="fa fa-2x fa-times-circle"></i></button>

                           @endif 

                       </form>
                       </td>
                       <td><a href="{{route('edit-level',$item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{route('delete-level',$item->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
        @endforeach
       @else
            <p style="color: red">No data available.</p>
       @endif
    </table>
</div>
</div>

@endsection