@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection

@section('main-content')

    <div class="row">
        <div class="col-sm-12">

        <div class="col-sm-6">
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
        </div>

        <div class="col-sm-6">
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
        </div>


        <div class="col-sm-6">
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
        </div>

        <div class="col-sm-6">
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


                </div>
            </div>
        </div>


    </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
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
                "ajax": '/employees/ajaxVacations',
                "paging": true,
                "sort": true
            });

        });

    </script>


@endsection
