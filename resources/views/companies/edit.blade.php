@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__("Edit Company")}}</div>
            <div class="card-body">
                <form id="edit-form"
                      action="{{ route('companies.update',$company->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row flex-column align-items-center">
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>{{ __("Name") }}</strong>
                                <input type="text" name="name" class="form-control" placeholder="Company name"
                                       value="{{ $company->name }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>{{ __("Email") }}</strong>
                                <input type="email" name="email" class="form-control" placeholder="Company Email"
                                       value="{{ $company->email }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>{{ __("Phone") }}</strong>
                                <input type="text" name="phone" class="form-control" placeholder="Company Phone"
                                       value="{{ $company->phone }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>{{ __("Website") }}</strong>
                                <input type="url" name="url" class="form-control" placeholder="Company Website"
                                       value="{{ $company->url}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>{{ __("Logo") }}</strong>
                                <input type="file" name="logo" class="form-control" placeholder="Company Logo"
                                       value="{{ $company->logo }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary ml-3 w-25 m-2">{{ __("Update") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#edit-form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: {{ route('companies.update', $company->id) }},
                type: "PUT",
                dataType: "json",
                cache: false,
                data: $("#edit-form").serialize(),
                success: function () {
                    alert("{{ __("Company") . ' ' . $company->name . ' ' . __("has been updated") }}");
                },
                error: function () {
                    alert("{{ __("Something gone wrong") }}");
                }
            });
        });
    </script>
@endsection
