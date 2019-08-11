<div class="alert alert-warning" role="alert">
  The value of each criteria to be filled must be based on the rules / category / standard (make your own).
</div>

<div class="row">
  <div class="col-md-12">
    <form action="<?php echo base_url('assessment/do_assessment') ?>" method="post">
      <table class="table table-bordered">
        <?php foreach ($alternative->result() as $key => $value): ?>
          <tr class="thead-dark">
            <th colspan="2"><?php echo $value->name ?> </th>
          </tr>
          <?php foreach ($criteria->result() as $k => $v): ?>
            <tr>
              <td><?php echo $v->name ?> <input type="hidden" name="alternative[]" value="<?php echo $value->id ?>"> <input type="hidden" name="criteria[]" value="<?php echo $v->id ?>"> </td>
              <td> <input type="text" class="form-control" name="value[]" value="0"> </td>
            </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </table>
      <button type="submit" class="btn btn-lg btn-primary">Submit</button>
    </form>

    <br><br><br>

  </div>
</div>
