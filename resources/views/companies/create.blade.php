@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __("Create New Company") }}</div>
            <div class="card-body">
                <form id="create-form"
                      action="{{ route('companies.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row flex-column align-items-center">
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="{{ __("Company Name") }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="{{ __("Company Email") }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="{{ __("Company Phone") }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="url" name="url" class="form-control" placeholder="{{ __("Company Website") }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="file" name="logo" class="form-control" placeholder="{{ __("Company Logo") }}">
                            </div>
                        </div>

                        <button type="submit" class="store btn btn-primary ml-3 w-25 m-2">{{ __("Save") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#create-form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: {{ route('companies.store') }},
                type: "POST",
                dataType: "json",
                cache: false,
                data: $("#create-form").serialize(),
                success: function () {
                    alert("{{ __("New company has been created") }}")
                },
                error: function () {
                    alert("{{ __("Something gone wrong") }}");
                }
            });
        });
    </script>
@endsection
