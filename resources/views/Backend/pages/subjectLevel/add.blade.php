@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Add Levels to subjects</h2>
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
        <input type="hidden" name="level" value="{{$level->id}}">
        
          <div class="form-group">
            <label for="">Grade</label>
            <select name="grade" id="getSubject" class="form-control">
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
        <div id="setSubject">
            
        </div>


          <div class="form-group">
              <button class="btn btn-info">Add</button>
          </div>
    </form>
</div>
<hr>
<h2>List of subjects in <span class="text-primary text-bold">{{$level->title}}</span> level</h2>
@if ($subjectlevelData->count()>0)
<div class="col-md-12">
    <input id="table_search" type="text" placeholder="Search here..." class="form-control"><br>
    <table class="table table-bordered table-stripped">
        <tr>
            <th>SN</th>
            <th>Grade</th>
            <th>Subject</th>
            <th>Status</th>
            <th >Action</th>
        </tr>
        <?php $key1 = 1 ;
                        
        if(isset($_GET['page']) && $_GET['page'] != ''){
                
            $key1 = 25*($_GET['page']-1)+1;

            }?>
        @foreach ($subjectlevelData as $item)
            <tr>
                <td>{{$key1++}}</td>
               
                   <td>{{$item->getGradeName->title}}</td>
                  <td>{{$item->getSubjectName->title}}</td>
                   <td>
                    <form action="{{route('subjectlevel-status')}}" method="post">
                        @csrf
                        <input type="hidden" name="criteria" value="{{$item->id}}">
                   @if ($item->status ==1)
                   <button  style="color:green;all:none" name="active"><i class="fa fa-2x fa-check-circle"></i></button>
                  
                   @else

                   <button style="color:red" name="inactive"><i class="fa fa-2x fa-times-circle"></i></button>

                       @endif 

                   </form>
                   </td>
               
                <td>
                    {{-- <a href="{{route('edit-subjectlevel',$item->id)}}" class="btn btn-sm btn-warning">Edit</a> --}}
                <a href="{{route('delete-subjectlevel',$item->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>
    {{-- {{$subjectlevelData->links('vendor.pagination.custom')}} --}}
</div>
@else
    <p  style="color: red">No data available.</p>
@endif
</div>

<script>
    $(document).ready(function(){
        $('#getSubject').on('change',function(){
            let data = $('#getSubject').val();
         
            $.ajax({
                type: "GET",
                url : "{{url('admin-panel/getSubject')}}",
                data:{grade:data},
                success: function(res){
                    $('#setSubject').html(res.subject)
                    // console.log(res.subject)
                }
            })
        })
    })
</script>

@endsection