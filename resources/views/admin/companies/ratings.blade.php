@extends('layouts.backend')
@section('page-title', 'Company '. $company->name . ' Ratings')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Company {{ $company->name }} Ratings
                </h3>

                <a href="{{ route('admin.companies.index') }}" class="btn btn-primary">All Companies</a>

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
                                <th>Feedback</th>
                                <th>Rating</th>
                                <th>Created At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($ratings as $ind => $rating)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $rating->name }}</td>

                                    <td>
                                       {{ $rating->email  }}
                                    </td>
                                    <td>
                                        {{ $rating->comment }}
                                    </td>
                                    <td>
                                        {{ $rating->rating }}
                                    </td>

                                    <td>{{ $rating->created_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">


                                            <form id="form-{{ $rating->id }}"
                                                action="{{ route('admin.ratings.destroy', $rating->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $rating->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>
                                    </td>

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
