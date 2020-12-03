<?php if ( isset($_SESSION["user"]) && ( $_SESSION["user"]["type"] == SA  || $_SESSION["user"]["type"] == A ) ) { ?>
    <div  class="add">
      <a href="index.php?action=add&model=book" class="detail">
        <i class="fas fa-plus-square fa-2x"></i> 
      </a>
    </div>
<?php } ?>
 <table class="list" >
      <thead>
        <tr>
          <th>Title</th>
          <th>Writer</th>
          <?php if ( isset($_SESSION["user"]) ) { ?>
              <th>Action</th>
          <?php } ?>  
        </tr>
      </thead>
      <tbody>
        <?php foreach ($content as $key => $value) { ?>
        <tr>
          <td><?= $value["title"] ?></td>
          <td><?= $value["writer"] ?></td>
          <?php if ( isset($_SESSION["user"]) ) { ?>
              <td><a href="index.php?action=detail&model=book&id=<?= $value["id"] ?>" class="detail">
                    <i class="fas fa-info-circle"></i>
                  </a> |
                  <a href="index.php?action=addComment&model=book&id=<?= $value["id"] ?>" class="detail">
                    <i class="fas fa-comment-medical"></i>
                  </a>
                  <?php if ( $_SESSION["user"]["type"] == SA  || $_SESSION["user"]["type"] == A ) { ?>
                       | 
                      <a href="index.php?action=edit&model=book&id=<?= $value["id"] ?>" class="modify" >
                        <i class="fas fa-edit"></i>
                      </a> | 
                      <a href="index.php?action=delete&model=book&id=<?= $value["id"] ?>" class="delete">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                <?php } ?>
              </td> 
          <?php } ?>   
        </tr>
        <?php } ?>
      </tbody>
    </table>


