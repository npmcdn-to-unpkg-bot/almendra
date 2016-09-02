
<div class="row">

	<!-- Join a room -->
	<div class="col-md-6">

		<!-- join form -->
		<form action="<?php echo $join_action; ?>" method="POST" role="form" 
			id="attending" >

			<h3>Attending</h3>
			<hr>

			<div class="form-group">
				<label for="">What's the room ID? </label>
				<input type="text" class="form-control" id="" placeholder="..." name="room_id">
			</div>

			<input type="hidden" class="form-control" name="nonce" value="<?php echo $nonce; ?>">
			

			<button type="submit" class="btn btn-danger">Join this room</button>
		</form><!-- /.join-form -->

	</div>

	<!-- Create a room -->
	<div class="col-md-6">

		<!-- present form -->
		<form action="<?php echo $create_action; ?>" method="POST" role="form" 
			id="presenting">


			<h3>Presenting?</h3>
			<hr>

			<div class="form-group">
				<label for="">Tell us your name </label>
				<input type="text" class="form-control" id="" placeholder="..." name="presenter_name">
			</div>

			<div class="form-group">
				<label for="">Tell us your email </label>
				<input type="email" class="form-control" id="" placeholder="..." name="presenter_email">
			</div>

			<div class="form-group">
				<label for="">What is your session called? </label>
				<input type="text" class="form-control" id="" placeholder="..." name="session_name">
			</div>

			<input type="hidden" class="form-control" name="nonce" value="<?php echo $nonce; ?>">
			

			<button type="submit" class="btn btn-danger">Create your room</button>
		</form><!-- /.present-form -->

	</div>
</div>

<hr>

