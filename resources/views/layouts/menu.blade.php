<li class="nav-item">
    <a href="/home" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            Initial Setups
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('sessions.index') }}" class="nav-link {{ Request::is('sessions*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sessions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shifts.index') }}" class="nav-link {{ Request::is('shifts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shifts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('classes.index') }}" class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Classes</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sections.index') }}" class="nav-link {{ Request::is('sections*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sections</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('subjects.index') }}" class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Subjects</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('subjectAssignings.index') }}" class="nav-link {{ Request::is('subjectAssignings*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Subject Assignings</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('examTypes.index') }}" class="nav-link {{ Request::is('examTypes*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Exam Types</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('feesCategories.index') }}" class="nav-link {{ Request::is('feesCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Fees Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('feesAmounts.index') }}" class="nav-link {{ Request::is('feesAmounts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Fees Amounts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('designations.index') }}" class="nav-link {{ Request::is('designations*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Designations</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
            Students
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('studentRegistrations.index') }}" class="nav-link {{ Request::is('studentRegistrations*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Registrations</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('studentRolls.index') }}" class="nav-link {{ Request::is('studentRolls*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Assigning Rolls</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('idcard') }}" class="nav-link {{ Request::is('idcard*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Id Card</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('feesRegistrations') }}" class="nav-link {{ Request::is('feesRegistrations*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Registration Fees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('feesMonthly') }}" class="nav-link {{ Request::is('feesMonthly*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Monthly Fees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('feesExam') }}" class="nav-link {{ Request::is('feesExam*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Exam Fees</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-paste"></i>
        <p>
            Exam Marks
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('marks.index') }}" class="nav-link {{ Request::is('marks*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Marks Entry</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('studentMarks_edit') }}" class="nav-link {{ Request::is('marks*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Marks Edit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('grades.index') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Grades</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marksheets_view_all') }}" class="nav-link {{ Request::is('marksheets_view_all*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Marksheets</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-user-secret" aria-hidden="true"></i>
        <p>
            Employees
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('employeeRegistrations.index') }}" class="nav-link {{ Request::is('employeeRegistrations*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Registrations</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salaryLogs.index') }}" class="nav-link {{ Request::is('salaryLogs*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('leaveCategories.index') }}" class="nav-link {{ Request::is('leaveCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('leaves.index') }}" class="nav-link {{ Request::is('leaves*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Leaves</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employeeAttendances.index') }}" class="nav-link {{ Request::is('employeeAttendances*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Attendances</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salaryMonthly') }}" class="nav-link {{ Request::is('salaryMonthly*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-rupee-sign"></i>
        <p>
            Accounts
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('fees.index') }}" class="nav-link {{ Request::is('fees*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Student Fees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salaries.index') }}" class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Employee Salaries</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('otherExpenses.index') }}" class="nav-link {{ Request::is('otherExpenses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Other Expenses</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-file" aria-hidden="true"></i>
        <p>
            Reports
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('profitMonthly') }}" class="nav-link {{ Request::is('profitMonthly*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Profit/Loss (Monthly)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employeeAttendanceReport') }}" class="nav-link {{ Request::is('employeeAttendanceReport*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Employee Attendances</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('result_summary') }}" class="nav-link {{ Request::is('result_summary*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Result Summary</p>
            </a>
        </li>
    </ul>
</li>

@if(Auth::user()->user_type == 'admins' || Auth::user()->role == 'admin')
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Users
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</li>
@endif