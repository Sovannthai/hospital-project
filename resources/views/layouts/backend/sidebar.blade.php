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
                @if (auth()->user()->can('view.dash'))
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('home'))active @endif">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                @endif
                <li class="dropdown">
                    @if (auth()->user()->can('view.user'))
                    <a href="javascript:;" class="dropdown-toggle">
                        <span  class="icon-copy fa fa-address-book-o" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">User Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('usermanagement.user.index') }}" class="@if (request()->routeIs('usermanagement.user.index'))active @endif" ><span class="icon-copy fa fa-user" aria-hidden="true"></span>User</a></li>
                        <li>
                            <a href="{{ route('usermanagement.usertype.index') }}" class="@if (request()->routeIs('usermanagement.usertype.index'))active @endif" ><span class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></span>User Type</a>
                        </li>
                        @if (auth()->user()->can('view.role'))
                        <li>
                            <a href="{{ route('role.index') }}" class="@if (request()->routeIs('role.index'))active @endif" ><span class="icon-copy dw dw-user-13"></span>Role</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('add_role') }}" class="@if (request()->routeIs('add_role'))active @endif" ><span class="icon-copy bi bi-plus-circle"></span>Add Role</a>
                        </li> --}}
                        @endif
                    </ul>
                    @endif
                </li>
                <li class="dropdown">
                    @if (auth()->user()->can('view.emp'))
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy fa fa-users" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Employees</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('employee.index') }}" class="@if (request()->routeIs('employee.index'))active @endif"><span class="icon-copy fa fa-user" aria-hidden="true"></span>Employee List</a></li>
                        <li>
                            <a href="{{ route('emp_group.index') }}" class="@if (request()->routeIs('emp_group.index'))active @endif"><span class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></span>Employee Group</a>
                        </li>
                    </ul>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->can('view.disease'))
                    <a href="{{ route('diseas.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('diseas.index'))active @endif">
                        <span class="icon-copy fa fa-resistance" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Disease</span>
                    </a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->can('view.pataint'))
                    <a href="{{ route('pataint.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('pataint.index'))active @endif">
                        <span class="icon-copy fa fa-address-book-o" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Pataint</span>
                    </a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->can('view.appointment'))
                    <a href="{{ route('appointment.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('appointment.index'))active @endif">
                        <span class="icon-copy dw dw-calendar-11"></span><span class="mtext" style="position: relative; left: -20px;">Appointment</span>
                    </a>
                    @endif
                </li>
                <li class="dropdown">
                    @if (auth()->user()->can('view.product'))
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy dw dw-box-1"></span><span class="mtext" style="position: relative; left: -20px;">Product Setup</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('product.index') }}" class="@if (request()->routeIs('product.index'))active @endif"><span class="icon-copy fa fa-list" aria-hidden="true"></span>List Product</a></li>
                        <li><a href="{{ route('categories.index') }}" class="@if (request()->routeIs('categories.index'))active @endif"><span class="icon-copy bi bi-tags-fill"></span>Category</a></li>
                        <li>
                            <a href="{{ route('unit.index') }}" class="@if (request()->routeIs('unit.index'))active @endif"><span class="icon-copy dw dw-balance"></span>Unit</a>
                        </li>
                    </ul>
                    @endif
                </li>
                {{-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="icon-copy dw dw-chat-3"></span><span class="mtext" style="position: relative; left: -20px;">Service Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href=""><span class="icon-copy fa fa-list" aria-hidden="true"></span>Service</a></li>
                        <li><a href=""><span class="icon-copy bi bi-tags-fill"></span>Service Category</a></li>
                    </ul>
                </li> --}}
                <li>
                    @if (auth()->user()->can('view.labo'))
                    <a href="{{ route('laboratory.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('laboratory.index'))active @endif">
                        <span class="icon-copy fa fa-industry" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Laboratory</span>
                    </a>
                    @endif
                </li>
                {{-- <li>
                    <a href="{{ route('staff.index') }}" class="dropdown-toggle no-arrow @if (request()->routeIs('staff.index'))active @endif">
                        <span class="icon-copy fa fa-users" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Staff</span>
                    </a>
                </li> --}}
                <li>
                    <a href="" class="dropdown-toggle no-arrow @if (request()->routeIs())active @endif">
                        <span class="icon-copy dw dw-phone-call" aria-hidden="true"></span><span class="mtext" style="position: relative; left: -20px;">Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
