@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create New Company</div>
            <div class="card-body">
                <form id="store-form"
                      action="{{ route('companies.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row flex-column align-items-center">
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Company name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Company Email">
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Company Phone">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="url" name="url" class="form-control" placeholder="Company Website">
                                @error('url')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="file" name="logo" class="form-control" placeholder="Company Logo">
                            </div>
                        </div>

                        <button type="submit" class="store btn btn-primary ml-3 w-25 m-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#form-store").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "/companies/",
                type: "POST",
                cache: false,
                dataType: "json",
                data: $("#form-store").serialize(),
                success: function () {
                    alert("New company has been created")
                },
                error: function () {
                    alert("Something gone wrong");
                }
            });
        });
    </script>
@endsection

