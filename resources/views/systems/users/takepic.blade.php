  <!-- CSS -->
    <style>
    #the_camera{
        width: 313px;
        height: 315px;
        border: 3px solid orange;
        align-content: center;
    }
	</style>
        <br>
		<h3 ><center>USER IMAGE CAPTURING FRAME</center></h3>
	<div class="col-md-12">
		<form action="{{url('/system/users/profile/upload-passport/')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="col-md-6" align="center">
				<div id="the_camera" align="center"></div><br>
				<input type="button" accept="image/*;capture=my_camera" value="Take Photograph" onClick="take_shotz()" class="btn btn-orange btn-block">
				<input type="hidden" name="image" class="image-tag">
				<br /><br>
			</div>

			<div class="col-md-6" align="center" id="uploadImageSec">				
		    	<div id="photo_preview" align="center"></div><br>
				<input type=submit value="Upload Image" name="uploadImage" id="uploadImage" onClick="uploadImage()" class="btn btn-primary btn-block">
				<input type="hidden" name="userid" value="{{$user->id}}">
			</div>
		</form>
	</div>
	<div class="col-md-12">
		<div class="clearfix text-center m-t">
            <div class="inline">
				<hr>
				<p class=""></p>
            </div>
        </div>
		<strong>Note:</strong> The image capture here here will be used as the facial identity of the staff. You are adviced to properly capture the image as to avoid mis-identity of staff
	</div>

    <script type="text/javascript" src="{{asset('js/webcam/webcam.min.js')}}"></script>
	<!-- Configure a few settings for and attach the camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 300,
			height: 240,
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

