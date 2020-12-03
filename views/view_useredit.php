<?php if( isset($content["errors"]) && $content["errors"] != "" ){ ?>
  <div class="detail">
  <?php foreach ($content["errors"] as $key => $value) { ?>
            <span style="color: red"><?= $value ?> </span>
            <br>
  <?php } ?>
  </div>
<?php } ?>
<div>
  <form action="index.php?action=update&model=user" method="post" >
      <input type="hidden" name="id" value="<?= $content["id"] ?>" >
      <input type="hidden" name="type" value="<?= $content["type"] ?>" >
      <div class="detail">
        <label>First Name</label>
        <input type="text"  name="firstName" value="<?= $content['firstName'] ?>" >
      </div>
      <div class="detail">
        <label>Last Name</label>
        <input type="text"  name="lastName" value="<?= $content['lastName'] ?>">
      </div>
      <div class="detail">
        <label>Email</label>
        <input type="text"  name="email" value="<?= $content['email'] ?>">
      </div>
      <div class="detail">
        <label>Type</label>
       
        <select name="type" <?= isset($_SESSION["user"]) && ( $_SESSION["user"]["type"] == SA )?"":"disabled" ?>  >
            <option value="user" <?= $content['type'] == U ?"selected":"" ?> >User</option>
            <option value="admin" <?= $content['type'] == A?"selected":"" ?> >Admin</option>
            <option value="superAdmin" <?= $content['type'] == SA?"selected":"" ?> >Super Admin</option>
        </select>
      </div>
      
      <div class="detail">
          <button type="submit" >Submit</button>
          <button >Cancel</button>
      </div>  
  </form>
</div>
 