@extends('index')

@section('content')
 <section class="content">
        <div class="row">
            <div class="col-sm-6">
                
                <form method="POST" action="{{route("updateData",$info->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="annotate_encode" name="annotate_encode" />
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{@$info->name}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{@$info->address}}">
                    </div><br><br>
                    <br><br>
                    <div class="form-group" >
                       <img id="output" style="max-width:600px; "  src="{{asset('images/') }}/{{@$info->image1 }}" onclick="showMarkerArea(this);"  />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" >Update Data</button>
                    </div>
            
                </form>
            </div>    
        </div>     
    <script>
        let markerArea = null;
        const target = document.getElementById("output");
        
        function showMarkerArea() {
            if(markerArea == null){
                markerArea = new markerjs2.MarkerArea(target);
                //for popup display 
                //markerArea.settings.displayMode = 'popup';
                markerArea.addRenderEventListener((imgURL, state) => { 
                    target.src = imgURL;
                    var annotate_encode = document.getElementById("annotate_encode");
                    var state_json = JSON.stringify(state);
                    let encodeData = window.btoa(state_json); //Encoding data
                    annotate_encode.value = encodeData; //Value Set
                });
            }
            markerArea.show();  
        }
        
        function loadAnnotation(markerArea){
            if(markerArea == null) return;
            var encodeData = '{{ $info->encode_data1 }}'; 
            var decodeData = window.atob(encodeData); //Decode data
            var state = JSON.parse(decodeData);
            markerArea.restoreState(state);
        }

        showMarkerArea();
        loadAnnotation(markerArea);
    </script>
</section>   
@endsection



