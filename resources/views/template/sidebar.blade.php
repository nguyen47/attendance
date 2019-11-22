<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-users"></i>
                <p>
                    Student
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('students.index')}}" class="nav-link">
                        <i class="far fa fa-list nav-icon"></i>
                        <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('students.create')}}" class="nav-link">
                        <i class="far fa fa-plus nav-icon"></i>
                        <p>Add New</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa fa-graduation-cap
                    "></i>
                    <p>
                        Majors
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('majors.index')}}" class="nav-link">
                            <i class="far fa fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('majors.create')}}" class="nav-link">
                            <i class="far fa fa-plus nav-icon"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa fa-check
                        "></i>
                        <p>
                            Attendance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('attendances.index')}}" class="nav-link">
                                <i class="far fa fa-list nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('attendances.create')}}" class="nav-link">
                                <i class="far fa fa-plus nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
        <li class="nav-header">Settings</li>
    </ul>
</nav>