<li class="header">ADMIN</li>
<li class="active">
    <a href="{{ route('schedule') }}">
        <i class="fa fa-calendar"></i> <span>Schedule</span>
    </a>
</li>
<li class="active">
    <a href="{{ route('plans.index') }}">
        <i class="fa fa-calendar"></i> <span>Plan</span>
    </a>
</li>
<li>
    <a href="{{ route('stations.index')  }}">
        <i class="fa fa-hospital-o"></i> <span>Stations</span>
    </a>
</li>
<li class="header">EMPLOYEES</li>
<li>
    <a href="{{ route('employees.index')  }}">
        <i class="fa fa-user-md"></i> <span>Manage</span>
    </a>
    <a href="{{ route('report')  }}">
        <i class="fa fa-user-md"></i> <span>Report</span>
    </a>
</li>