 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-info elevation-4">
     <!-- Brand Logo -->
     <a href="/admin" class="brand-link bg-info">
         <img src="/img/AdminLTELogo.png" alt="BrighterLives Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">BrighterLives 1.0</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ ucfirst(auth()->user()->first_name) }}</a>
                 <div class="btn-group">
                     <a href="/settings" class="btn btn-sm btn-link text-white mt-1" title="Profile settings"><i
                             class="fas fa-cogs"></i> </a>
                     <a href="/logout" class="btn btn-sm btn-link text-white mt-1 mx-1" title="Logout"><i
                             class="fas fa-sign-out-alt"></i></a>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item ">
                     <a href="#" class="nav-link">
                         <i class="fas fa-tachometer-alt nav-icon"></i>
                         <p>{{__('dashboard')}}</p>
                     </a>
                 </li>
                 <div class="user-panel pb-2"></div>
                 <li class="nav-header pt-3 ">Activities & Products Mgt</li>
                 <li class="nav-item ">
                     <a href="/admin/activities" class="nav-link {{ Request::is('admin/activities') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-code-branch"></i>
                         <p>
                             {{__('All Activites')}}
                         </p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="/admin/products" class="nav-link {{ Request::is('admin/products') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-ticket-alt"></i>
                         <p>
                             {{__('All Products')}}
                         </p>
                     </a>
                 </li>
                 <div class="user-panel pb-2"></div>
                 <li class="nav-header pt-3 ">Association Management</li>
                 <li class="nav-item ">
                     <a href="/admin/associations"
                         class="nav-link {{ Request::is('admin/associations') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-project-diagram"></i>
                         <p>
                             {{__('All Associations')}}
                         </p>
                     </a>
                 </li>
                 <div class="user-panel pb-2"></div>
                 <li class="nav-header pt-3">Categories Management</li>
                 <li class="nav-item ">
                     <a href="/admin/categories" class="nav-link {{ Request::is('admin/categories') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             {{__('Categories')}}
                         </p>
                     </a>
                 </li>
                 <div class="user-panel pb-2"></div>
                 <li class="nav-header  pt-3">Users Management</li>
                 <li class="nav-item ">
                     <a href="/admin/users" class="nav-link {{ Request::is('admin/users') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             {{__('All Users')}}
                         </p>
                     </a>
                 </li>
                <div class="user-panel pb-2"></div>
                 <li class="nav-header pt-3 ">Transactions History </li>
                 <li class="nav-item ">
                     <a href="/admin/transactionlog"
                         class="nav-link {{ Request::is('admin/transactionlog') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-money-bill-alt"></i>
                         <p>
                             {{__('Transaction History')}}
                         </p>
                     </a>
                 </li>
                <div class="user-panel pb-2"></div>
                 <li class="nav-header pt-3 ">Activity Logs </li>
                 <li class="nav-item ">
                     <a href="/admin/activitylog"
                         class="nav-link {{ Request::is('admin/activitylog') ? 'active' : ''}} ">
                         <i class="nav-icon fas fa-file-invoice"></i>
                         <p>
                             {{__('My Activitylog')}}
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>