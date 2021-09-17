<?php 
    $this->layout('layouts/login');
    $this->set('title','login');
?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="index.php?controller=Auth&action=login" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Login Id" name="loginId">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button style="margin-left: 120%;" type="submit" name="login" class="btn btn-primary btn-block btn-sm">Log in</button>
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>