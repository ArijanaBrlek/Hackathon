@extends('layouts.app')

@section('htmlheader_title')
    Plan
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
                            <th class="">MON</th>
                            <th class="">TUE</th>
                            <th class="">WED</th>
                            <th class="">THU</th>
                            <th class="">FRI</th>
                            <th class="">SAT</th>
                            <th class="">SUN</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <row>
        <button class="btn btn-primary btn-flat" >
            Generate scedule from plan
        </button>
    </row>


@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({

                "ajax": {
                    'url': '/plan/ajax',
                    'data': function () {
                        return {week: currentWeek};
                    }
                },
                "paging": true,
                "sort": true
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


            $(document).on('change', '.plan-type', function() {
                               var planId = $(this).attr('data-plan-id');

                                     $.post('/plan/update/' + planId, {
                                                  plan_type_code: $(this).val()
                                });
                           });

          /*  $(document).on('click', '.plan-type', function() {
                var planId = $(this).attr('data-plan-id');
                var code = $(this).attr('data-code');

                $.post('/plan/update/' + planId, {
                   plan_type_code: code
                });
            });*/
        });
    </script>
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.min.js') }}"></script>

@endsection
