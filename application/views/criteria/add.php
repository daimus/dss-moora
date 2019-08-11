<div class="row">
	<div class="col-md-12">
		<form method="post" action="<?php echo base_url('criteria/do_add') ?>">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Weight</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="weight" name="weight" required placeholder="1" step="0.01" min="0" max="1">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Type</label>
				<div class="col-sm-10">
					<select class="form-control" id="type" name="type" required>
						<option value="benefit">benefit</option>
						<option value="cost">cost</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
