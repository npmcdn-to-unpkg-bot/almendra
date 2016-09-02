

<div class="row">

	<!-- Join a room -->
	<div class="col-md-6">

		<!-- join form -->
		<form action="<?php echo $sample_action; ?>" method="POST" role="form" 
			id="attending" >

			<h3>Test</h3>
			<hr>

			<div class="form-group">
				<label for="">What's the room ID? </label>
				<input type="text" class="form-control" id="" placeholder="..." name="room_id">
			</div>

			<div class="form-group">
				<label for="">Your say </label>
				<input type="text" class="form-control" id="" placeholder="" name="sayer_id">
			</div>

			<input type="hidden" class="form-control" name="nonce" value="<?php echo $nonce; ?>">
			

			<button type="submit" class="btn btn-danger">Join this room</button>
		</form><!-- /.join-form -->

	</div>

	
</div>

<hr>



