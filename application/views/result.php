<div class="row">
  <div class="col-md-12 text-right">
    <a href="<?php echo base_url('result/get_result') ?>" class="btn btn-primary">Get result</a>
  </div>
</div>

<br> <br>

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Alternative</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($data->result() as $key => $value): ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->name ?></td>
            <td><?php echo $value->score ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
