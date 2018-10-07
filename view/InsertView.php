<div class="container">
<form method="POST" action="index.php?csrf=<?php echo $_SESSION["token"] ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" id="tit" class="form-control" name="title">
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
    <textarea class="form-control" rows="3" name="body" id="body"></textarea>
  </div>
  <button type="submit" id="submit" class="btn btn-primary">Post</button>
</form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>

window.onload = function () {
  
    if(document.getElementById("submit"))
        document.getElementById("submit").onclick = validateField
}

function validateField(){
  var title =document.getElementById("tit").value;
  var body =document.getElementById("body").value;

  if (title && $.trim(title).length != 0 ) {
    document.getElementById("tit").setCustomValidity(''); 
  }
  else {
    document.getElementById("tit").setCustomValidity("Can not post empty title");
  }  

  if (body && $.trim(body).length != 0 ) {
    document.getElementById("body").setCustomValidity(''); 
  }
  else {
    document.getElementById("body").setCustomValidity("Can not post empty body");
  }
}
</script>