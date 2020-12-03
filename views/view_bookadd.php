<?php if( isset($content["errors"]) && $content["errors"] != "" ){ ?>
  <div class="detail">
  <?php foreach ($content["errors"] as $key => $value) { ?>
            <span style="color: red"><?= $value ?> </span>
            <br>
  <?php } ?>
  </div>
<?php } ?>
<div>
  <form action="index.php?action=insert&model=book" method="post" >
    <div class="box">
      <input type="hidden" name="id" value="" >
      <div class="detail">
        <label>Title</label>
        <input type="text"  name="title" value="" >
      </div>
      <div class="detail">
        <label>Year</label>
        <input type="text"  name="year" value="">
      </div>
      <div class="detail">
        <label>Writer</label>
        <input type="text"  name="writer" value="">
      </div>
      <div class="detail">
        <label>Type</label>
        <input type="text"  name="type" value="">
      </div>
      <div class="detail">
        <label>Description</label>
        <textarea  name="description" rows="4"></textarea>
      </div>
    </div>

    <div class="detail">
      <h3>
        Translator List
      </h3 > 
    </div>
    <div class="box">

        <?php if (isset($content["allTranslators"]) && count($content["allTranslators"]) > 0) {
                  foreach ($content["allTranslators"] as $key => $value) { ?>
                    <input type="checkbox" name="translators[]" value="<?= $value["id"] ?>" > 
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
 