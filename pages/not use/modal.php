
<!-- The Modal for SIGN-IN -->
<div class="modal fade text-center" id="myModal-signIn">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title text-center">Log-in Here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <button class="btn btn-lg fb btn-block form-signin" >Continue with Facebook</button>
          <button class="btn btn-lg google btn-block form-signin">Continue with Google</button>
          <hr>
          <a>Or</a>
          <hr>
          <form method="post" action="" class="form-signin">
            <!--<label for="uname" class="sr-only">User Name</label>-->
            <input type="text"  name="uname" class="form-control" placeholder="User Name" required="" autofocus=""><br>
            <!--<label for="pwd" class="sr-only">Password:</label><br>-->
            <input type="password"  name="pwd"  id="pwd_txtBox" class="form-control" placeholder="Password" required=""> 
            <div class="checkbox mb-3">
              <label>
                  <input type="checkbox" id="chkBoxShwPWD">Show Password
              </label>
            </div>
            <input type="submit" value="Log-in"  class="btn btn-lg btn-primary btn-block" >
          </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer form-signin">
          <a>Not a member yet?</a>
          <a class="linkBtn"  data-toggle="modal" data-target="#myModal-signUp" data-dismiss="modal" >Join Now</a>
        </div>
        
      </div>
    </div>
  </div>

<!-- The Modal for SIGN-UP-->
<div class="modal fade text-center" id="myModal-signUp">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title">Sign-up Here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <button class="btn btn-lg fb btn-block form-signin" >Continue with Facebook</button>
          <button class="btn btn-lg google btn-block form-signin">Continue with Google</button>
          <hr>
          <a>Or</a>
          <hr>
          <form method="post" action="" class="form-signin">
            <!--<label for="uname" class="sr-only">User Name</label>-->
            <input type="email"   class="form-control" placeholder="email address" required="" autofocus=""><br>
            <input type="submit" value="Continue" id="btnContinueSignUp" class="btn btn-lg btn-primary btn-block">
          </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer form-signin">
          <a>Already a member?</a>
          <a class="linkBtn"  data-toggle="modal" data-target="#myModal-signIn" data-dismiss="modal" >Sign in</a>
        </div>
        
      </div>
    </div>
  </div>


<!-- The Modal for SIGN-UPCONTINUE -->
<div class="modal fade text-center" id="myModal-signUp-2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" >
      
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title text-center">Join Now</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="" class="form-signin">
            <!--<label for="uname" class="sr-only">User Name</label>-->
            <input type="text"  name="uname" class="form-control" placeholder="User Name" required="" autofocus=""><br>
            <!--<label for="pwd" class="sr-only">Password:</label><br>-->
            <input type="password"  name="pwd"   class="form-control" placeholder="Password" required=""> 
            <div class="checkbox mb-3">
              <label>
                  <input type="checkbox" >Show Password
              </label>
            </div>
            <input type="submit" value="Sign-up"  class="btn btn-lg btn-primary btn-block" >
          </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer form-signin">
          <a>Already a member?</a>
          <a class="linkBtn"  data-toggle="modal" data-target="#myModal-signIn" data-dismiss="modal" >Sign in</a>
        </div>
        
      </div>
    </div>
  </div>