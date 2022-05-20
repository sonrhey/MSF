
<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li class="sidebar-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
      <a href="/dashboard" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="sidebar-item {{ (request()->is('store-registration*')) ? 'active' : '' }}">
      <a href="/store-registration" class='sidebar-link'>
        <i class="bi bi-shop"></i>
        <span>Register Store</span>
      </a>
    </li>
    <li class="sidebar-item {{ (request()->is('product-area*')) ? 'active' : '' }}">
      <a href="/product-area" class='sidebar-link'>
        <i class="bi bi-bag-dash-fill"></i>
        <span>Products Area</span>
      </a>
    </li>
    <li class="sidebar-item {{ (request()->is('motorcycle-type*')) ? 'active' : '' }}">
      <a href="/motorcycle-type" class='sidebar-link'>
        <i class="bi bi-bicycle"></i>
        <span>Motorcycle Type</span>
      </a>
    </li>
    <li class="sidebar-item {{ (request()->is('motorcycle-type*')) ? 'active' : '' }}">
      <a href="/sales" class='sidebar-link'>
        <i class="bi bi-list"></i>
        <span>Sales Report</span>
      </a>
    </li>
    <li class="sidebar-item">
      <form id="logout">
        @csrf
        <a href="#" onclick="event.preventDefault(); logout()" class='sidebar-link'>
          <i class="bi bi-box-arrow-left"></i>
          <span>Logout</span>
        </a>
    </form>
    </li>
  </ul>
</div>