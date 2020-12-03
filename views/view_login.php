
<div>
  <div class="detail">
      <h3>
          <?php if (isset($content) && $content != "") { ?>
              <?php if ($content =="success") { ?>
                Registration Successful - Welcome
              <?php }elseif ($content =="failed") { ?>
                Invalid username or password - Try again
              <?php } ?>
          <?php }else{ ?>
            Login 
          <?php } ?>
      </h3>
  </div>
  <form action="index.php?action=authentified&model=user" method="post" >
      <div class="detail">
        <label>Email address</label>
        <input type="text"  name="email" placeholder="Enter email">
      </div>
      <div class="detail">
        <label>Password</label>
        <input type="password"  name="password" placeholder="Password">
      </div>
 
      <div class="detail">
          <button type="submit" >Login</button>
          <button >Cancel</button>
          <a href="index.php?action=email_check">Forget Password</a>
      </div>  
  </form>
</div>

