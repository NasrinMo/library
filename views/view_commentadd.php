 <div>

  <form action="index.php?action=insertComment&model=book&id=<?= $content["book"]["id"] ?>" method="post" >
    <input type="hidden" name="id_book" value="<?= $content["book"]["id"] ?>" >
    <input type="hidden" name="id_user" value="<?= $content["currentUser"]["id"] ?>" >
    <div class="detail">
      <h3>Your Comment About <?= ucfirst($content["book"]["title"]) ?> Book</h3>
      <textarea  name="comment" rows="8" placeholder="Type here..."></textarea>
    </div>
    <div class="detail">
      <button type="submit" >Submit</button>
      <button >Cancel</button>
    </div>  
  </form>
</div>
 <div class="detail">
  <?php if (isset($content["comments"]) && count($content["comments"]) > 0) { ?>
          <h3>Other users' comments about <?= ucfirst($content["book"]["title"]) ?> Book</h3>
          <?php foreach ($content["comments"] as $key => $value) { ?>
              <label> 
                  Written by <?= ucfirst($value["firstName"])." ".ucfirst($value["lastName"]) ?> On <?= $value["update_at"] ?>
                  <br>
                   <p><?= $value["comment"] ?></p>   
             </label>
          <?php } ?>  
  <?php }else{ ?>
          <p>Be the first one to leave the comment about <?= ucfirst($content["book"]["title"]) ?> book</p>
  <?php } ?> 
 </div>
 