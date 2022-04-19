@extends('Backend.main')
@section('content')
<div class="container">
    <h2><i class="fa fa-list"></i> Grade List</h2> <hr>
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
   @if ($GradeData->count()>0)
   <div class="col-md-12">
    <input id="table_search" type="text" placeholder="Search here..." class="form-control"><br>
    <table class="table table-bordered table-stripped">
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th >Action</th>
        </tr>
        <?php $key1 = 1 ;
                        
        if(isset($_GET['page']) && $_GET['page'] != ''){
                
            $key1 = 25*($_GET['page']-1)+1;

            }?>
        @foreach ($GradeData as $item)
            <tr>
                <td>{{$key1++}}</td>
                <td>
                    @if(isset($singleGradeData) && $singleGradeData->id == $item->id)
                    <form action="{{route('edit-grade',$singleGradeData->id)}}" method="POST">
                         @csrf
                         <div class="row">
                         <div class="form-group">
                              <input type="text" class="form-control " name="title" value="{{$singleGradeData->title}}">
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
                    {{$item->title}}

                    @endif
                </td>
                <td><a href="{{route('edit-grade',$item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{route('delete-grade',$item->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>
    {{$GradeData->links('vendor.pagination.custom')}}
</div>
   @else
       <p style="color:red">No data available.</p>
   @endif
</div>

@endsection