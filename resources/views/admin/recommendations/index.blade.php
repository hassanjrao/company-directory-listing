@extends('layouts.backend')
@section('page-title', 'Recommendations')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Recommendations
                </h3>



                {{-- <a href="{{ route('admin.recommendations.create') }}" class="btn btn-primary">Add</a> --}}

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                {{-- <th>Action</th> --}}

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($recommendations as $ind => $recommendation)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $recommendation->name }}</td>

                                    <td>{{ $recommendation->email }}</td>
                                    <td>{{ $recommendation->message }}</td>
                                    <td>{{ $recommendation->created_at }}</td>
                                    <td>{{ $recommendation->updated_at }}</td>



                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>






    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
