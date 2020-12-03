<table class="list" >
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $content["translators"]['firstName'] ?></td>
          <td><?= $content["translators"]["lastName"] ?></td>
          <td><?= $content["translators"]["description"] ?></td>
        </tr>
      </tbody>
</table>
<br>
<div class="detail" >
    <h3>Books translated by <?= $content["translators"]["firstName"]." ".$content["translators"]["lastName"] ?></h3>
    <div class="box">
      <?php if(isset($content["translators"]["books"]) && count($content["translators"]["books"]) > 0){ ?>
              <ul>
             <?php foreach ($content["translators"]["books"] as $key => $value) { ?>
                <li><?= $value['title'] ." written  by  ".$value['writer'].". (".$value['year'].")" ?></li>
             <?php  } ?>
             </ul>
      <?php }else{ ?>
              <h4>Empty</h4>
      <?php }?>
    </div>
    <a  href="<?= $_SERVER["HTTP_REFERER"] ?>">Go back</a>
</div>
   
