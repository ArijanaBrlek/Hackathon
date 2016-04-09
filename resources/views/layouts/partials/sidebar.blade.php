<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
        @endif

        @hasrole('administrator')
            @include('layouts.partials.admin.sidebar')
        @else
            @include('layouts.partials.employee.sidebar')
        @endhasrole


    </section>
    <!-- /.sidebar -->
</aside>
