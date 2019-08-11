<div class="row">
	<div class="col-md-12">
		<form method="post" action="<?php echo base_url('alternative/do_edit/') . $data->id ?>">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="id" name="id" disabled value="<?php echo $data->id ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name ?>" required>
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
