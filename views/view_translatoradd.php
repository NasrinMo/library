<div>
  <form action="index.php?action=insert&model=translator" method="post" >

    <div class="detail">
      <label>First Name</label>
      <input type="text"  name="firstName" >
    </div>
    <div class="detail">
      <label>Last Name</label>
      <input type="text"  name="lastName" >
    </div>
    <div class="detail">
      <label>Description</label>
      <textarea  name="description" rows="4"></textarea>
    </div>

    <div class="detail">
      <h3>
        Book List
      </h3 >
    </div>
    <div class="box">

        <?php if (isset($content["allBooks"]) && count($content["allBooks"]) > 0) {
                  foreach ($content["allBooks"] as $key => $value) { ?>
                    <input type="checkbox" name="books[]" value="<?= $value["id"] ?>" > 
                    <label>
                        <?= $value['title'] ." written  by  ".$value['writer'].". (".$value['year'].")" ?>
                    </label>
                    <br>
           <?php  } 
              } else {  ?>
                   <h4>Empty</h4>
        <?php } ?>
        
    </div>  
    <div class="detail">
      <button type="submit" >Submit</button>
      <button >Cancel</button>
    </div>  
  </form>
</div>
 