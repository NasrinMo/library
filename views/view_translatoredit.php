<?php if( isset($content["errors"]) && $content["errors"] != "" ){ ?>
  <div class="detail">
  <?php foreach ( $content["errors"] as $key => $value ) { ?>
            <span style="color: red"><?= $value ?> </span>
            <br>
  <?php } ?>
  </div>
<?php } ?>
<div>
  <form action="index.php?action=update&model=translator" method="post" >
   
    <input type="hidden" name="id" value="<?= $content["translators"]["id"] ?>" >
    <div class="detail">
      <label>First Name</label>
      <input type="text"  name="firstName" value="<?= $content["translators"]['firstName'] ?>" >
    </div>
    <div class="detail">
      <label>Last Name</label>
      <input type="text"  name="lastName" value="<?= $content["translators"]['lastName'] ?>">
    </div>
    <div class="detail">
      <label>Description</label>
      <textarea  name="description" rows="4"><?= $content["translators"]['description'] ?> </textarea>
    </div>

    <div class="detail">
      <h3>
        Book List
      </h3 >
    </div>
    <div class="box">

        <?php if (isset($content["allBooks"]) && count($content["allBooks"]) > 0) {
                  foreach ($content["allBooks"] as $key => $value) { ?>
                    <input type="checkbox" name="books[]" value="<?= $value["id"] ?>" 
                    <?= isset($content["translators"]["books"][$value["id"]]) ? "checked" : "" ?> > 
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
 