<div class="container">
<form method="POST" action="index.php">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" placeholder="Title" name="title">
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" id="exampleSelect1" name="categoryId">

    <?php foreach($data[0] as $category): ?>
      <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
    <?php endforeach; ?>

    </select>
  </div>
  <div class="form-group">
    <label>Text</label>
    <textarea class="form-control" rows="3" name="body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Post</button>
</form>
</div>