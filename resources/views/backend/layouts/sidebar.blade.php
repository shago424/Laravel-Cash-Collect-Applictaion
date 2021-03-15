 @php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav style="" class="mt-2">
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          <!-- Roles -->

          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

          <!-- Suppliers -->
          <li class="nav-item has-treeview {{($prefix=='/vendors')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Vendor Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vendors.view')}}" class="nav-link {{($route=='vendors.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Vendor</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vendors.add')}}" class="nav-link {{($route=='vendors.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Vendor</p> 
                </a>
              </li>
            </ul>
          </li> 

            <!-- members -->
          <li class="nav-item has-treeview {{($prefix=='/members')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Member Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('members.view')}}" class="nav-link {{($route=='members.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Member</p> 
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{route('members.add')}}" class="nav-link {{($route=='members.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Member</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('members.credit')}}" class="nav-link {{($route=='members.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit/Due Member</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('members.paid')}}" class="nav-link {{($route=='members.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Member</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('members.wise-report-view')}}" class="nav-link {{($route=='members.wise-report-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Wise Report</p> 
                </a>
              </li>
            </ul>
          </li> 



            <!-- Invoice -->
      <li class="nav-item has-treeview {{($prefix=='/invoices')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Invoice Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.view')}}" class="nav-link {{($route=='invoices.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoices.all-detail-view')}}" class="nav-link {{($route=='invoices.all-detail-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Details View</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoices.add')}}" class="nav-link {{($route=='invoices.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Invoice</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('invoices.pending-list')}}" class="nav-link {{($route=='invoices.pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending List</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoices.daily-report-view')}}" class="nav-link {{($route=='invoices.daily-report-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p> 
                </a>
              </li>
            </ul>
           </li>

                          <!-- Dabit -->
      <li class="nav-item has-treeview {{($prefix=='/accounts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Account Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.view')}}" class="nav-link {{($route=='accounts.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account View</p> 
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.all-report')}}" class="nav-link {{($route=='accounts.all-report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Report</p> 
                </a>
              </li>
            </ul>
           </li>

                        <!-- Stock -->
      <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Customer Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Customer View</p> 
                </a>
              </li>
            
            </ul>
           </li>
                 
      



            <!-- Stock -->
      <li class="nav-item has-treeview {{($prefix=='/stocks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Stock Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stocks.view')}}" class="nav-link {{($route=='stocks.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product By Stock View</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stocks.supplier-stock-view')}}" class="nav-link {{($route=='stocks.supplier-stock-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier By Stock View</p> 
                </a>
              </li>
            </ul>
           </li>
      
     

      
      
        