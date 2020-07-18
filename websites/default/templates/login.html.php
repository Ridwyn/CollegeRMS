      
      
      
      
      
      <div class="container login">
      <h3><?=$errors ?? ''?></h3>
                <div class="logo">Woodlands College Records Management System</div>
                <div class="login-item">
                  <form action="" method="post" class="form form-login">
                    <div class="form-field">
                      <label class="user" for="login-username"><span class="hidden">Username</span></label>
                      <input name= "username" id="login-username" type="text" class="form-input" placeholder="Username" required>
                    </div>
            
                    <div class="form-field">
                      <label class="lock" for="login-password"><span class="hidden">Password</span></label>
                      <input name= "password" id="login-password" type="password" class="form-input" placeholder="Password" required>
                    </div>
            
                    <div class="form-field">
                      <input type="submit" value="Log in">
                    </div>
                  </form>
                </div>
            </div>
