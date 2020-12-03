<?php if( isset($content["errors"]) && $content["errors"] != "" ){ ?>
  <div class="detail">
  <?php foreach ($content["errors"] as $key => $value) { ?>
            <span style="color: red"><?= $value ?> </span>
            <br>
  <?php } ?>
  </div>
<?php } ?>
<div>
  <form action="index.php?action=update&model=book" method="post" > 
      <input type="hidden" name="id" value="<?= $content["books"]["id"] ?>" >
      <div class="detail">
        <label>Title</label>
        <input type="text"  name="title" value="<?= $content["books"]['title'] ?>" >
      </div>
      <div class="detail">
        <label>Year</label>
        <input type="text"  name="year" value="<?= $content["books"]['year'] ?>">
      </div>
      <div class="detail">
        <label>Writer</label>
        <input type="text"  name="writer" value="<?= $content["books"]['writer'] ?>">
      </div>
      <div class="detail">
        <label>Type</label>
        <input type="text"  name="type" value="<?= $content["books"]['type'] ?>">
      </div>
      <div class="detail">
        <label>Description</label>
        <textarea  name="description" rows="4"><?= $content["books"]['description'] ?> </textarea>
      </div>
      <div class="detail">
        <h3>
          Translator List
        </h3 >
      </div>
      <div class="box">

        <?php if (isset($content["allTranslators"]) && count($content["allTranslators"]) > 0) {
                  foreach ($content["allTranslators"] as $key => $value) { ?>
                    <input type="checkbox" name="translators[]" value="<?= $value["id"] ?>" 
                    <?= isset($content["books"]["translators"][$value["id"]]) ? "checked" : "" ?> > 
                    <label>
                        <?= $value['firstName'] ." ".$value['lastName'] ?>
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
 