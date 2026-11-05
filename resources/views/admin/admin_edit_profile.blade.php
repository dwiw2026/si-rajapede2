@extends('admin.adminmaster')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-fluid">

        <div class="row">
            {{-- <form> --}}

            <div class=" col-md-6 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile User {{ Auth::user()->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{ route('store.adminprofile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Penguna</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File Foto</label>

                                {{-- <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                </div>
                            </div> --}}

                                <div>
                                    <input type="file" class="form-control" id="image" name="profile_image">

                                    {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                </div>


                            </div>

                            {{-- <div class="form-group">
                                <img id="showImage" src="{{ asset('backend/dist/img/user2-160x160.jpg') }}"
                                    class="img-circle elevation-2" alt="User Image">

                            </div> --}}

                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-body">

                            <div class="image  ">
                                <img id="showImage" src="{{ asset('backend/dist/img/user2-160x160.jpg') }}"
                                    class="img-circle elevation-2" alt="User Image">
                            </div>

                        </div> --}}


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save
                                Profile</button>
                        </div>
                    </form>

                </div>
            </div>

            @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
            @endphp

            <div class="col-md-6  ">
                <div class="card card-danger">
                    <div class="card-header ">
                        <h3 class="card-title">Foto User {{ Auth::user()->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        <div class="image text-center ">
                            <img id="showImage"
                                src="{{ isset($adminData->profile_image) ? url('upload/user_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}"
                                class="img-circle  elevation-2" alt="User Image" height="30%" width="50%">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>

        {{-- </form> --}}

        <!-- /.row -->
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader()
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0'])

            })
        })
    </script>
@endsection
