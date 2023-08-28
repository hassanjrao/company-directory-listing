@extends('layouts.backend')

@php
    $addEdit = isset($moderator) ? 'Edit' : 'Add';
    $addUpdate = isset($moderator) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Moderator')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Moderator</h3>


                <a href="{{ route('admin.moderators.index') }}" class="btn btn-primary">All Moderators</a>


            </div>
            <div class="block-content">

                @if ($moderator)
                    <form action="{{ route('admin.moderators.update', $moderator->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.moderators.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('name', $moderator ? $moderator->name : null);

                                ?>
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('email', $moderator ? $moderator->email : null);

                                ?>
                                <label class="form-label" for="label">Email <span class="text-danger">*</span></label>
                                <input required type="email" value="{{ $value }}" class="form-control"
                                    id="email" name="email" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = null;

                                ?>
                                <label class="form-label" for="label">Password
                                    @if (!$moderator)

                                    <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <input {{ $moderator ? '' : 'required' }} type="password" value="{{ $value }}" class="form-control"
                                    id="password" name="password" placeholder="Enter password">
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>








                    </div>


                </div>

                <div class="d-flex justify-content-end mb-4">

                    <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')



    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>



@endsection
