@extends('layouts.backend')
@section('page-title', 'Moderators')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Moderators
                </h3>



                <a href="{{ route('admin.moderators.create') }}" class="btn btn-primary">Add</a>

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
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($moderators as $ind => $moderator)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $moderator->name }}</td>


                                    <td>
                                        {{ $moderator->email }}
                                    </td>


                                    <td>{{ $moderator->created_at }}</td>
                                    <td>{{ $moderator->updated_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            @if($moderator->is_blocked)
                                            <a href="{{ route('admin.moderators.unblock', $moderator->id) }}"
                                                class="btn btn-sm btn-alt-success">Unblock</a>
                                            @else
                                            <a href="{{ route('admin.moderators.block', $moderator->id) }}"
                                                class="btn btn-sm btn-alt-warning">Block</a>
                                            @endif
                                            <a href="{{ route('admin.moderators.edit', $moderator->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $moderator->id }}"
                                                action="{{ route('admin.moderators.destroy', $moderator->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $moderator->id }})"
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
