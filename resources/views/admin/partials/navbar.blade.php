<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">LaraPress</a> 
    </div>
    <div id="bs-navbar-collapse-1" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li @if(Route::is('admin-categories'))class="active"@endif>
          <a href="{{ route('admin-categories') }}">
            <i class="fa fa-th-large fa-fw"></i>
            Categories
          </a>
        </li>
        <li @if(Route::is('admin-posts'))class="active"@endif>
          <a href="{{ route('admin-posts') }}">
            <i class="fa fa-files-o fa-fw"></i>
            Posts
          </a>
        </li>
        <li @if(Route::is('admin-users'))class="active"@endif>
          <a href="{{ route('admin-users') }}">
            <i class="fa fa-users fa-fw"></i>
            Authors
          </a>
        </li>
      </ul>
      @if(\Auth::user())
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" 
               class="dropdown-toggle"
               data-toggle="dropdown"
               role="button"
               aria-haspopup="true"
               aria-expanded="false"
            >
              {{ \Auth::user()->name }}
              {{ \Auth::user()->surname }}
              <span class="caret"></span>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">
                    <i class="fa fa-fw fa-envelope"></i>
                    Messages
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-fw fa-cogs"></i>
                    Settings
                  </a>
                </li>
                <li class="divider" role="separator"></li>
                <li>
                  <a href="/admin/logout">
                    <i class="fa fa-sign-out fa-fw"></i>
                    Sign out
                  </a>
                </li>
              </ul>
            </a>
          </li>
        </ul>
      @endif
    </div>
  </div>
</nav>
