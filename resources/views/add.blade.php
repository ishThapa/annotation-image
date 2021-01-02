@extends('index')

@section('content')
    


<div class="row">
    @if(session('success'))
        <div class="alert alert-success alert-block">
                {{ session('success') }}
        </div>
    @endif
</div>
<div class="flex-box-containner">
    <div style="text-align: center">
        <h2>Enter your Details</h2>
    </div>
    <form method="POST" action="{{ route('insertData') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address">
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"> Photo</label>
            <div class="col-sm-6">     
               <input type="file" class="form-control" name="image1">
              
               @if ($errors->has('image1'))
                    <span class="text-danger">{{ $errors->first('image1') }}</span>
                @endif
               <!----  <input type="file" class="form-control" name="file[]" multiple>---->
            </div>

        </div>
        <button type="submit" class="btn btn-lg btn-primary">Save</button>
    </form>
</div>

@endsection