<?php if ( isset($_SESSION["user"]) && ( $_SESSION["user"]["type"] == SA  || $_SESSION["user"]["type"] == A ) ) { ?>
    <div  class="add">
      <a href="index.php?action=add&model=translator" class="detail">
        <i class="fas fa-user-plus"></i> 
      </a>
    </div>
<?php }?>
<table class="list" >
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <?php if ( isset($_SESSION["user"]) ) { ?>
              <th>Action</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($content as $key => $value) { ?>
        <tr>
          <td><?= $value["firstName"] ?></td>
          <td><?= $value["lastName"] ?></td>
          <?php if ( isset($_SESSION["user"]) ) { ?>
              <td><a href="index.php?action=detail&model=translator&id=<?= $value["id"] ?>" class="detail">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <?php if ( $_SESSION["user"]["type"] == SA  || $_SESSION["user"]["type"] == A ) { ?>
                         | 
                        <a href="index.php?action=edit&model=translator&id=<?= $value["id"] ?>" class="modify" >
                          <i class="fas fa-edit"></i>
                        </a> | 
                        <a href="index.php?action=delete&model=translator&id=<?= $value["id"] ?>" class="delete">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                  <?php } ?>
              </td> 
          <?php } ?>  
        </tr>
        <?php } ?>
      </tbody>
</table>