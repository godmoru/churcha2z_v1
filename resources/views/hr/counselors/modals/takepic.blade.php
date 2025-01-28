  <!-- CSS -->
    <style>
    #the_camera{
        width: 190px;
        height: 170px;
        border: 3px solid blue lighten;
        align-content: center;
    }
	</style>
        <br>
		<h3 ><center>IMAGE CAPTURING FRAME</center></h3> <hr>
	<div class="col-md-12">
		<form action="{{url('/counselors/one/upload-passport')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-5" align="center">
					<div id="the_camera" align="center"></div><br>
					<input type="button" accept="image/*;capture=my_camera" value="Take Photo" onClick="take_shotz()" class="btn btn-outline-warning btn-block btn-xs" align="center">
					<input type="hidden" name="image" class="image-tag">
					<br /><br>
				</div>

				<div class="col-md-5" align="center" id="uploadImageSec">				
			    	<div id="photo_preview" align="center"></div><br>
					<input type=submit value="Upload Image" name="uploadImage" id="uploadImage" onClick="uploadImage()" class="btn btn-primary btn-block btn-xs" align="center">
					<input type="hidden" name="counselorid" value="{{$counselor->id}}">
				</div>
			</div>
		</form>
	</div>
    <script type="text/javascript" src="{{asset('js/webcam/webcam.min.js')}}"></script>
	<!-- Configure a few settings for and attach the camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 200,
			height: 170,
			image_format: 'png',
			jpeg_quality: 100
		});
		Webcam.reset();
		Webcam.attach( '#the_camera' );
	</script>
	
	<!-- ....taking the snapshot and displaying the captured image -->
	<script language="JavaScript">
		 function take_shotz() {
        	Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('photo_preview').innerHTML = '<img src="'+data_uri+'"/>';
	        } );
	    }
	</script>

