<div class="alert alert-warning" role="alert">
  Total of weights must be exactly 1 (one)
</div>

<div class="row">
  <div class="col-md-12 text-right">
    <a href="<?php echo base_url('criteria/add') ?>" class="btn btn-primary">Add</a>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Weight</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data->result() as $key => $value): ?>
          <tr>
            <td><?php echo $value->name ?></td>
            <td><?php echo $value->weight ?></td>
            <td><?php echo $value->type ?></td>
            <td>
              <a href="<?php echo base_url('criteria/edit/') . $value->id ?>" class="btn btn-primary">Edit</a>
              <a href="<?php echo base_url('criteria/do_delete/') . $value->id ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
