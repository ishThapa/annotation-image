@extends('index');

@section('content')
    
<section class="content"> 
<div class="row">

    
    <div class="col-sm-12"><h3 style="text-align: center">View Records</h3></div>

</div>
<div class="row">
    <div class="row">
        <div class="col-sm-12">
        @if(session('status'))
            <div class="alert alert-success alert-block">
                {{ session('status') }}
            </div>
        @endif
    </div> 
    </div>
    <div class="col-sm-12">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>Address</th>
                <th colspan="3" style="text-align: center">Featured image</th>
                <th colspan="2" style="text-align: center">Action</th>
                
        </thead>
        <tbody>
            @foreach ($keys as $key)
                
                <tr>
                 
                    <td>{{$key['name']}}</td>
                    <td>{{$key['address']}}</td>
                    <td>
                        <img src="{{ asset('images/') }}/{{ @$key['image1']}}"
                        class="img-thumbnail" width="70">
                    </td>
                    <td>
                        <a href="{{ route('editData',$key['id'])}}"><i class="fa fa-edit" >View</i></a>
                    </td>    
                    <td>    <a href="{{ route('deleteData',$key['id'])}}"><i class="fa fa-trash">Delete</i></a> 
                    </td>
                </tr>
              @endforeach      
        </tbody>   
    </div>

</div>



</section>
@endsection

