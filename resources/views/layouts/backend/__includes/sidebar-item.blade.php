<li class="menu-section">
  <h4 class="menu-text"> Main </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/broadcasters*')) ? 'menu-item-open' : '' }}">
  <a class="menu-link menu-toggle">
    <i class="menu-icon fas fa-users"></i>
    <span class="menu-text"> Broadcasters </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/broadcasters/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/broadcasters/members') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Members </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/broadcasters/reports*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/broadcasters/reports') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Reports </span></a></li>
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/broadcasters/pk*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/broadcasters/pk') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> PK </span></a></li>
    </ul>
  </div>
</li>
<li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families*')) ? 'menu-item-open' : '' }}">
  <a class="menu-link menu-toggle">
    <i class="menu-icon fas fa-users"></i>
    <span class="menu-text"> Families </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="menu-submenu">
    <ul class="menu-subnav">
      <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/families/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/families/members') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Members </span></a></li>
    </ul>
  </div>
</li>
