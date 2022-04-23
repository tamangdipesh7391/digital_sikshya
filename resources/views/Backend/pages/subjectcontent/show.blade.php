@extends('Backend.main')
@section('content')
<div class="container">
    @if ($subwisecontentData->count()>0)
    <h2><i class="fa fa-list"></i> Subject Content List of 
        {{$subwisecontentData[0]->getSubjectName->title}} (Grade : {{$subwisecontentData[0]->getGradeName->title}} <b>- {{$subwisecontentData[0]->getLevelName->title}}</b> )
        </h2>
   
    @endif 
    <hr>
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
    @if ($subwisecontentData->count()>0)
    <div class="col-md-12">
        <input id="table_search" type="text" placeholder="Search here..." class="form-control"><br>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>SN</th>
                <th>Heading</th>
                <th>Title</th>
                <th>Status</th>
                <th >Action</th>
            </tr>
            <?php $key1 = 1 ;
							
            if(isset($_GET['page']) && $_GET['page'] != ''){
                    
                $key1 = 25*($_GET['page']-1)+1;

                }?>
            @foreach ($subwisecontentData as $item)
                <tr>
                    <td>{{$key1++}}</td>
                   
                       <td>  {{$item->heading}}</td>
                      <td> {{$item->title}}</td>
                      
                       <td>
                        <form action="{{route('subject-status')}}" method="post">
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
                        <a href="{{route('view-subjectcontent',$item->id)}}" class="btn btn-sm btn-info">View Details</a>

                        <a href="{{route('edit-subjectcontent',$item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('delete-subjectcontent',$item->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </table>
        {{$subwisecontentData->links('vendor.pagination.custom')}}
    </div>
    @else
        <p style="color: red">No data available.</p>
    @endif
</div>

@endsection