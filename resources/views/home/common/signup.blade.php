<form action="{{ action('AdminsController@signup') }}" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-fw fa-user"></i>
      </span>
      <input type="text"
             name="name"
             class="form-control"
             placeholder="Your Name" 
      />
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-fw fa-users"></i>
      </span>
      <input type="text"
             name="surname"
             class="form-control"
             placeholder="Your Surname" 
      />
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-fw fa-at"></i>
      </span>
      <input type="email"
             name="email"
             class="form-control"
             placeholder="Your email" 
      />
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-fw fa-lock"></i>
      </span>
      <input type="password"
             name="password"
             class="form-control"
             placeholder="Your Password" 
      />
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-fw fa-lock"></i>
      </span>
      <input type="password"
             name="password_confirmation"
             class="form-control"
             placeholder="Confirm Password" 
      />
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary btn-lg btn-expand"
            data-toggle="tooltip"
            data-placement="bottom"
            title="Sign Up as an Author">
      <i class="fa fa-save"></i>
      Sign Up
    </button>
  </div>
</form>
