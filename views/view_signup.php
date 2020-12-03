<?php if( isset($content) && $content != "" ){ ?>
  <div class="detail">
  <?php foreach ($content as $key => $value) { ?>
            <span style="color: red"><?= $value ?> </span>
            <br>
  <?php } ?>
  </div>
<?php } ?>
<div>
  <div class="detail">
      <h3>Sign Up </h3>
  </div>
  <form action="index.php?action=insert&model=user" method="post" >
      <input type="hidden" name="id" value="" >
      <div class="detail">
        <label>First Name</label>
        <input type="text"  name="firstName" value="" >
      </div>
      <div class="detail">
        <label>Last Name</label>
        <input type="text"  name="lastName" value="">
      </div>
      <div class="detail">
        <label>Email</label>
        <input type="text"  name="email" value="">
      </div>
      
      <div class="detail">
        <label>Password</label>
        <input type="password"  name="password">
      </div>
      <ul class="passwordDesc">
        <li>At least one lowercase char</li>
        <li>At least one uppercase char</li>
        <li>At least one digit</li>
        <li>At least one special sign of @#-_$%^&+=§!?</li>
      </ul>
      <div class="detail">
          <button type="submit" >Submit</button>
          <button >Cancel</button>
      </div>  
  </form>
</div>
 