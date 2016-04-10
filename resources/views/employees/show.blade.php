@extends('layouts.app')

@section('htmlheader_title')
    Employee
@endsection

@section('main-content')

    <div class="col-md-4">

        <!-- /.info-box -->
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-hourglass-half"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Working hours</span>
                <span class="info-box-number">163,921</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                </div>
                  <span class="progress-description">
                   Average per week: 38.5h
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-hourglass"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Overtimes</span>
                <span class="info-box-number">5,200</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                  <span class="progress-description">
                   Average: 3/5 per week
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <!-- /.info-box -->
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-plane"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Godišnji odmor</span>
                <span class="info-box-number">92,050</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                </div>
                  <span class="progress-description">
                    Used: 26/40
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <!-- /.info-box -->
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-heartbeat"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Bolovanje</span>
                <span class="info-box-number">114,381</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                  <span class="progress-description">
                    Average 2 days/year
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>

    </div>

    <div class="col-md-8">

        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="box-tools">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 text-center">

                            <a href="#" id="previous-week" class="paginate-arrow" data-week="0">
                                <i class="fa fa-chevron-left black"></i></a>
                                <span class="week-title">
                                    Week <span id="current-week">1</span>/2016
                                </span>
                            <a href="#" id="next-week" class="paginate-arrow" data-week="2">
                                <i class="fa fa-chevron-right black"></i></a>
                        </div>
                        <div class="col-sm-4 text-right">
                        </div>

                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="datatable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="col-sm-2">Week</th>
                        <th class="width-14">MON</th>
                        <th class="width-14">TUE</th>
                        <th class="width-14">WED</th>
                        <th class="width-14">THU</th>
                        <th class="width-14">FRI</th>
                        <th class="width-14">SAT</th>
                        <th class="width-14">SUN</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>

 {{--   <h1>Employee</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>First Name</th><th>Last Name</th><th>OIB</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $employee->id }}</td> <td> {{ $employee->first_name }} </td><td> {{ $employee->last_name }} </td><td> {{ $employee->OIB }} </td>
                </tr>
            </tbody>    
        </table>
    </div>--}}

@endsection


@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
               "ajax": {
                    'url': '/employees/single/{{ $employee->id }}',
                   'data': function () {
                       return {week: currentWeek};
                   }
                },
                "paging": true,
                "sort": true
            });
            table = $('#datatable').DataTable();
            $('#datatable tbody').on('click', '.shift', function () {
                var scheduleId = $(this).attr('data-id');
                $.getJSON('/modal/' + scheduleId, function (data) {
                    $('#myModal').replaceWith(data.data);
                    $('#myModal').modal('show');
                });
            });

        });

        var currentWeek = 1;
        $(function () {
            $('#next-week').click(function () {
                currentWeek+=4;
                updateWeek();
                $('#datatable').DataTable().ajax.reload();
            });

            $('#previous-week').click(function () {
                if (currentWeek > 1) {
                    currentWeek-=4;
                    updateWeek();
                }
                $('#datatable').DataTable().ajax.reload();
            });

            function updateWeek() {
                $('#current-week').html(currentWeek);
            }

        });
    </script>

@endsection