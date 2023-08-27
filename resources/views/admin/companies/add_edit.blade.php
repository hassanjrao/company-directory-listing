@extends('layouts.backend')

@php
    $addEdit = isset($company) ? 'Edit' : 'Add';
    $addUpdate = isset($company) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Company')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Company</h3>


                <a href="{{ route('admin.companies.index') }}" class="btn btn-primary">All Companies</a>


            </div>
            <div class="block-content">

                @if ($company)
                    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('name', $company ? $company->name : null);

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




                        </div>






                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                @if ($company && $company->image)
                                    <br><br>
                                    <img src="{{ $company->image_url }}" alt="" style="width: 200px"
                                        class="img-fluid">
                                    <br>
                                @endif

                                <label class="form-label" for="label">Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="Select image">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <?php
                                $value = old('description', $company ? $company->description : null);

                                ?>
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="editor" class="form-control" style="width: 100%" rows="30">{{ $value }}</textarea>

                                @error('description')
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
