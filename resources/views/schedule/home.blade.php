@extends('layouts.app')

@section('htmlheader_title')
    Schedule
@endsection

@section('main-content')

    <div class="row">
        <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>MON</th>
                            <th>TUE</th>
                            <th>WED</th>
                            <th>THU</th>
                            <th>FRI</th>
                            <th>SAT</th>
                            <th>SUN</th>
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
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table =  $('#example').DataTable({
                "ajax": '/ajax'
            });

            table =  $('#example').DataTable();
            $('#example tbody').on( 'click', '.day-shift', function () {
                console.log(table.cell(this).data());
            } );

        } );


    </script>

    <script>

    </script>

@endsection
