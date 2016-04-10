@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection

@section('main-content')

    <div class="row">
        <div class="col-sm-12">

        <section class="col-sm-6">

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Working hours</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="box-body table-responsive">
                        <table id="datatable-hours" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-sm-7">Name</th>
                                <th class="col-sm-5">Hours</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Overtime</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="box-body table-responsive">
                        <table id="datatable-overtimes" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-sm-7">Name</th>
                                <th class="col-sm-5">Hours</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>

        </section>

        <section class="col-sm-6">


            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Vacations</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="box-body table-responsive">
                        <table id="datatable-vacations" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-sm-7">Name</th>
                                <th class="col-sm-5">Days</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>


                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Team statistics</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <label class="col-sm-3">Employee</label>
                            <select name="employee" id="employee_id" class="select2 col-sm-8" data-placeholder="Select employee">
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name  }} {{ $employee->last_name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br/>
                        <div class="row">
                            <label class="col-sm-3">Base station: </label>
                            <div>
                                <label id="baseStation" class="col-sm-9"></label>
                            </div>
                        </div>
                        <div class="row">
                            <canvas id="chart" style="height: 250px;"></canvas>

                        </div>
</div>
                </div>

        </section>


    </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            $(".select2").select2();

            var tableHours = $('#datatable-hours').DataTable({
                "ajax": '/employees/ajaxHours',
                "paging": true,
                "sort": true
            });
            tableHours = $('#datatable-hours').DataTable();


            var tableVacations = $('#datatable-vacations').DataTable({
                "ajax": '/employees/ajaxVacations',
                "paging": true,
                "sort": true
            });
            tableVacations = $('#datatable-vacations').DataTable();


            var tableOvertimes = $('#datatable-overtimes').DataTable({
                "ajax": '/employees/ajaxOvertimes',
                "paging": true,
                "sort": true
            });

            var employeeId = $('#employee_id').val();

             $.getJSON('/employees/ajax/' + employeeId, function(data) {
                 $('#baseStation').html(data.station);

                  pieChart.Doughnut(data.pieData, pieOptions);
             });

            $('#employee_id').change(function() {
               var employeeId = $(this).val();

                $.getJSON('/employees/ajax/' + employeeId, function(data) {
                   $('#baseStation').html(data.station);

                    pieChart.Doughnut(data.pieData, pieOptions);

                });
            });


        });


        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#chart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
    };
    </script>


@endsection
