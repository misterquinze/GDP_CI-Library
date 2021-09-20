<?=form_open('login/index', 'id=formLogin');?>
  <fieldset>
    <legend class="h2">Login Page</legend>
    <hr>
    <div class="form-group">
        <label for="txtEmail" class="form-label mt-4">Email Address</label>
        <input type="email" class="form-control" name="userEmail" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" >
		<small id="emailtHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="txtPassword" class="form-label mt-4">Password</label>
        <input type="password" class="form-control" name="userPass" id="txtPassword" aria-describedby="passwordHelp" placeholder="Password" >
        <small id="passwordHelp" class="form-text text-muted">Your password is secure.</small>
    </div>

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

