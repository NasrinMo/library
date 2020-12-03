<table class="list" >
      <thead>
        <tr>
          <th>Title</th>
          <th>Year</th>
          <th>Writer</th>
          <th>Type</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $content["books"]['title'] ?></td>
          <td><?= $content["books"]["year"] ?></td>
          <td><?= $content["books"]["writer"] ?></td>
          <td><?= $content["books"]["type"] ?></td>
          <td><?= $content["books"]["description"] ?></td>
        </tr>
      </tbody>
</table>
<br>
<div class="detail" >
    <h3>The translators who translated  <?= $content["books"]["title"] ?></h3>
    <div class="box">
      <?php if(isset($content["books"]["translators"]) && count($content["books"]["translators"]) > 0){ ?>
              <ul>
             <?php foreach ($content["books"]["translators"] as $key => $value) { ?>
                <li><?= $value['firstName'] ."  ".$value['lastName'] ?></li>
             <?php  } ?>
             </ul>
      <?php }else{ ?>
              <h4>Empty</h4>
      <?php }?>
    </div>
    <a  href="<?= $_SERVER["HTTP_REFERER"] ?>">Go back</a>
</div>
   



