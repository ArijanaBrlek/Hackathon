@extends('layouts.app')

@section('htmlheader_title')
    Schedule
@endsection

@section('main-content')

    <div class="row">
        <div class="col-sm-12">
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
                            <th class="col-sm-2">Name</th>
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
    </div>


@endsection


@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({

                "ajax": {
                    'url': '/ajax',
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

    </script>

    <script>
        var currentWeek = 1;
        $(function () {
            $('#next-week').click(function () {
                currentWeek++;
                updateWeek();
                $('#datatable').DataTable().ajax.reload();
            });

            $('#previous-week').click(function () {
                if (currentWeek > 1) {
                    currentWeek--;
                    updateWeek();
                }
                $('#datatable').DataTable().ajax.reload();
            });

            function updateWeek() {
                $('#current-week').html(currentWeek);
            }

        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.min.js') }}"></script>

@endsection
