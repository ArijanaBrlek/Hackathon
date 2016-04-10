<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <br/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
        @endif


        <ul class="sidebar-menu">
            @hasrole('administrator')
                @include('layouts.partials.admin.sidebar')
            @endhasrole
            @hasrole('employee')
                @include('layouts.partials.employee.sidebar')
            @endhasrole
        </ul>


    </section>
    <!-- /.sidebar -->
</aside>
