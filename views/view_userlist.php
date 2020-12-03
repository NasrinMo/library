<div  class="add">
  <a href="index.php?action=add&model=user" class="detail">
    <i class="fas fa-plus-square fa-2x"></i> 
  </a>
</div>
 <table class="list" >
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($content as $key => $value) { ?>
        <tr>
          <td><?= $value["firstName"] ?></td>
          <td><?= $value["lastName"] ?></td>
          <td><a href="index.php?action=detail&model=user&id=<?= $value["id"] ?>" class="detail">
                <i class="fas fa-info-circle"></i>
              </a> | 
              <a href="index.php?action=edit&model=user&id=<?= $value["id"] ?>" class="modify" >
                <i class="fas fa-edit"></i>
              </a> | 
              <a href="index.php?action=delete&model=user&id=<?= $value["id"] ?>" class="delete">
                <i class="fas fa-trash-alt"></i>
              </a>
          </td>   
        </tr>
        <?php } ?>
      </tbody>
    </table>


