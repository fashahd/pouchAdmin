<?=$this->layout->headerlogin()?>
<body class="cyan">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" id="login">
          <div class="row">
            <div class="input-field col s12 center">
              <?=$this->layout->logo_white()?>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">person_outline</i>
              <input name="email" type="email" required>
              <label for="email" class="center-align">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input name="password" type="password" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12" id="loginbutton">
              	<button class="btn waves-effect waves-light col s12">Login</button>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="<?=base_url()?>auth/register">Register Now!</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
	<?=$this->layout->loadjslogin()?>
</body>
