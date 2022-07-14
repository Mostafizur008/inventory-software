<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->

    @include('backend.main-section.body.sidebar.logo.band')

    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">User Module</li>
          @if(Auth::user()->role == "Admin")
          <li class="nav-item has-treeview {{($prefix=='/users')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{($route=='user.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.add')}}" class="nav-link {{($route=='user.add')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>User Add</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview {{($prefix=='/profile')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Profile Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link {{($route=='profile.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Profile View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('change.password')}}" class="nav-link {{($route=='change.password')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Management Module</li>

          @if(Auth::user()->role == "Admin")
          <li class="nav-item has-treeview {{($prefix=='/system')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-elementor"></i>
              <p>
                System Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                   Supplier List
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{route('unit.view')}}" class="nav-link {{($route=='unit.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Unit List
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{route('cat.view')}}" class="nav-link {{($route=='cat.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Category List
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.view')}}" class="nav-link {{($route=='product.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Product List
                  </p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == "Manager")
          <li class="nav-item has-treeview {{($prefix=='/system')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-elementor"></i>
              <p>
                System Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                   Supplier List
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{route('unit.view')}}" class="nav-link {{($route=='unit.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Unit List
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{route('cat.view')}}" class="nav-link {{($route=='cat.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Category List
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.view')}}" class="nav-link {{($route=='product.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>
                    Product List
                  </p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview {{($prefix=='/customer')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manage Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.view')}}" class="nav-link {{($route=='customer.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Customer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('credit.customer')}}" class="nav-link {{($route=='credit.customer')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Credit Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('paid.customer')}}" class="nav-link {{($route=='paid.customer')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Paid Customer</p>
                </a>
              </li>
            </ul>
          </li>


          @if(Auth::user()->role == "Admin")
          <li class="nav-item has-treeview {{($prefix=='/purchase')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Purchase Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchase.view')}}" class="nav-link {{($route=='purchase.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pending.view')}}" class="nav-link {{($route=='pending.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Purchase Approve</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == "Manager")
          <li class="nav-item has-treeview {{($prefix=='/purchase')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Purchase Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchase.view')}}" class="nav-link {{($route=='purchase.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pending.view')}}" class="nav-link {{($route=='pending.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Purchase Approve</p>
                </a>
              </li>
            </ul>
          </li> 
          @endif
          
          <li class="nav-item has-treeview {{($prefix=='/invoice')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Invoice Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.view')}}" class="nav-link {{($route=='invoice.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Invoice List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('approve.view')}}" class="nav-link {{($route=='approve.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Invoice Approve</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{($prefix=='/report')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Report Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('daily.view')}}" class="nav-link {{($route=='daily.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Daily Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pc.view')}}" class="nav-link {{($route=='pc.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Daily Purchase Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stock.view')}}" class="nav-link {{($route=='stock.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Stock Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sp.view')}}" class="nav-link {{($route=='sp.view')? 'active':''}}">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Supllier/Product Stock</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth::user()->role == "Admin")
          <li class="nav-item has-treeview">
            <a href="{{route('setting.view')}}" class="nav-link {{($route=='setting.view')? 'active':''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Site Settings
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>