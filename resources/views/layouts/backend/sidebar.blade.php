<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            {{--logo--}}
            <img src="{{ asset('uploads/logo/logo3.png') }}" alt="" style="border-radius: 10px 200px">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('home'))active @endif">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-users" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">User Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('usermanagement.user.index') }}" class="@if (request()->routeIs('usermanagement.user.index'))active @endif" ><span class="icon-copy fa fa-user-secret" aria-hidden="true"></span>User</a></li>
                        <li>
                            <a href="{{ route('usermanagement.usertype.index') }}" class="@if (request()->routeIs('usermanagement.usertype.index'))active @endif" ><span class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></span>User Type</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('diseas.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('diseas.index'))active @endif">
                        <span class="icon-copy fa fa-resistance" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Disease</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-address-book-o" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Pataint</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('pataint.index') }}" class="@if (request()->routeIs('pataint.index'))active @endif"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Patient</a></li>
                        <li>
                            <a href="{{ route('pataint.create') }}" class="@if (request()->routeIs('pataint.create'))active @endif"><span class="icon-copy fa fa-plus-circle" aria-hidden="true"></span>Add Patient</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-user-plus" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Nurse</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('nurse.index') }}"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Patient</a></li>
                        <li>
                            <a href="{{ route('nurse.create') }}" ><span class="icon-copy fa fa-plus-circle" aria-hidden="true"></span>Add Patient</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy dw dw-calendar-11"></span><span class="mtext" style="position: relative; left: -20px;">Appointment</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('appointment.index') }}" class="@if (request()->routeIs('appointment.index'))active @endif"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Appointment</a></li>
                        <li>
                            <a href="{{ route('appointment.create') }}" class="@if (request()->routeIs('appointment.create'))active @endif"><span class="icon-copy fa fa-plus-circle" aria-hidden="true"></span>Add Patient</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-medkit" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Medicine</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Medicine</a></li>
                        <li><a href="form-basic.html"><span class="icon-copy bi bi-tags-fill"></span>Category</a></li>
                        <li>
                            <a href="advanced-components.html"><span class="icon-copy fa fa-plus-circle" aria-hidden="true"></span>Add New </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-industry" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Laboratory</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Laboratory</a></li>
                        <li><a href="form-basic.html"><span class="icon-copy bi bi-tags-fill"></span>Category</a></li>
                        <li>
                            <a href="advanced-components.html"><span class="icon-copy fa fa-plus-circle" aria-hidden="true"></span>Add New </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
