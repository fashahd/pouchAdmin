<?=$this->layout->headerlogin()?>
<body class="blue lighten-1">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" id="regis">
          <div class="row">
            <div class="input-field col s12 center">
              <?=$this->layout->logo_white()?>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">email</i>
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
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">person_outline</i>
              <input name="name" type="text" required>
              <label for="name" class="center-align">Full Name</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">phone</i>
              <input name="phone" type="text" required>
              <label for="phone" class="center-align">Phone Number</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">business</i>
              <input name="business_name" type="text" required>
              <label for="business_name" class="center-align">Business Name</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">card_travel</i>
              <input name="business_email" type="email" required>
              <label for="business_email" class="center-align">Business Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12" id="register">
              	<button class="waves-effect waves-light btn gradient-45deg-light-blue-cyan box-shadow col s12">Register Now</button>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="<?=base_url()?>auth/login">Login Here!</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
	<?=$this->layout->loadjslogin()?>
</body>
