<div class="row">
  <div class="col-md-12 text-right">
    <a href="<?php echo base_url('alternative/add') ?>" class="btn btn-primary">Add</a>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data->result() as $key => $value): ?>
          <tr>
            <td><?php echo $value->name ?></td>
            <td>
              <a href="<?php echo base_url('alternative/edit/') . $value->id ?>" class="btn btn-primary">Edit</a>
              <a href="<?php echo base_url('alternative/do_delete/') . $value->id ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
