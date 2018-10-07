<div class="container">
  <div id="post" class="postlist"> 
    <h1>Topics</h1>
    <hr>
    <hr>
    <tabLe class="table table-striped">

      <?php foreach($data[0] as $topic): ?>
      <tr>
	<td><a href="/CodeOps_Forum/index.php?id=<?php echo $topic->id ?>"><?php echo $topic->title?> </a></td>
	<td>
    <form action="index.php" method="post">
      <input type="hidden" name="topicIdd" value="<?php echo $topic->id ?>">
      <?php if(($data[1] && $data[2] ) && $data[2]->admin) { ?>
        <button type="submit" class="btn btn-danger del" value="Delete" data-id=""><i class="fa fa-trash"></i></button>
      <?php } ?>
    </form>
	</td>
      </tr>
      <?php endforeach; ?>
    </table>
    <hr>
  </div>
</div>
