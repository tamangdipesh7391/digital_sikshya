@extends('Backend.main')
@section('content')
<div class="container">
    <h2><i class="fa fa-list"></i> Subject Content List </h2> <hr>
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
    @if ($subjectlevel->count()>0)
    <div class="row">
        @foreach ($subjectlevel as $subjectlevel)
        <div class="col-md-4">
            <div class="card  mb-3">
                <div class="card-header bg-primary"><h4>
                    
                    {{$subjectlevel->getLevelName->title}} Level</h4></div>
                <div class="card-body">
                  <h5 class="card-title text-primary "><b>{{$subjectlevel->getSubjectName->title}} - {{$subjectlevel->getGradeName->title}}</b></h5>
                  <br>
                  <hr >
                   <p>
                    <a href="{{url('admin-panel/add-subjectcontent/'.$subjectlevel->subject.'/'.$subjectlevel->grade.'/'.$subjectlevel->level)}}" class="btn btn-sm btn-outline-primary mr-3">Add Content</a>
                    <a href="{{url('admin-panel/show-subjectcontent/'.$subjectlevel->subject.'/'.$subjectlevel->grade.'/'.$subjectlevel->level)}}" class="btn btn-sm btn-outline-success">Manage Content</a>
                   </p>
    
                </div>
              </div>
        </div>
        @endforeach
    </div>
    @else
        <p style="color: red">No data available.</p>
    @endif
</div>

@endsection