@extends('layouts.backend')
@section('page-title', 'Companies')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Companies
                </h3>



                <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Overall Rating</th>
                                <th>Total Good Ratings</th>
                                <th>Total Bad Ratings</th>
                                <th>Total Ratings</th>
                                <th>Total Average Ratings</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($companies as $ind => $company)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $company->name }}</td>

                                    <td>
                                        @if ($company->image)
                                            <img src="{{ $company->image_url }}" alt="" width="100px">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{ $company->description_short }}
                                    </td>
                                    <td>
                                        {{ $company->overall_rating }}
                                    </td>
                                    <td>
                                        {{ $company->good_ratings }}
                                    </td>
                                    <td>
                                        {{ $company->bad_ratings }}
                                    </td>
                                    <td>
                                        {{ $company->ratings->count() }}
                                    </td>
                                    <td>
                                        {{ $company->average_ratings }}
                                    </td>
                                    <td>{{ $company->created_at }}</td>
                                    <td>{{ $company->updated_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.companies.ratings', $company->id) }}"
                                                class="btn btn-sm btn-alt-success">Ratings</a>

                                            <a href="{{ route('admin.companies.edit', $company->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $company->id }}"
                                                action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $company->id }})"
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
