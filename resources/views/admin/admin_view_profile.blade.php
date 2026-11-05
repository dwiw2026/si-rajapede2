@extends('admin.adminmaster')
@section('admin')
    <div class="row">
        <div class="card card-primary col-md-9 ">
            <div class="card-header">
                <h3 class="card-title">Profile {{ Auth::user()->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" disabled
                            placeholder="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" disabled
                            placeholder="{{ Auth::user()->email }}">
                    </div>


                    {{-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div> --}}

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> <a class="text-white"
                            href="{{ route('edit.adminprofile') }}">
                            Edit Profile
                        </a></button>
                </div>
            </form>
        </div>

        <div class="card card-danger col-md-3  ">
            <div class="card-header ">
                <h3 class="card-title">Foto {{ Auth::user()->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">

                <div class="image text-center ">
                    <img src="{{ isset($adminData->profile_image) ? url('upload/user_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}"
                        class="img-circle elevation-2" alt="User Image" height="150">
                </div>

            </div>
            <!-- /.card-body -->

        </div>

    </div>
@endsection
