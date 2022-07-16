sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Doctor Dentist</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
               <!--  <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>Default</a>
                        </li>
                        <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('admin/doctor') }}"><i class="bx bx-right-arrow-alt"></i>Doctor</a>
                        </li>
                        <li> <a href="{{ url('admin/sub-admin') }}"><i class="bx bx-right-arrow-alt"></i>Sub Admin</a>
                        </li>
                    </ul>
                </li> 

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">General Settings</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('admin/permission') }}"><i class="bx bx-right-arrow-alt"></i>Permission</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper 