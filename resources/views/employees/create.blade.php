@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__("Create New Employee")}}</div>
            <div class="card-body">
                <form id="store-form"
                      action="{{ route('employees.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row flex-column align-items-center">
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control"
                                       placeholder="{{__("Employee First Name")}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control"
                                       placeholder="{{__("Employee Last Name")}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <select name="company_id" class="form-select">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{__("Employee Email")}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control"
                                       placeholder="{{__("Employee Phone")}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <label for="note"></label>
                                <textarea class="form-control" name="note" id="note"
                                          placeholder="{{__("Notes")}}"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3 w-25 m-2">{{__("Save")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#form-store").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "/employees/",
                type: "POST",
                cache: false,
                data: $('#form-store').serialize(),
                success: function () {
                    alert({{__("New employee has been created")}})

                },
                error: function () {
                    alert({{__("Something gone wrong")}});
                }
            });
        });
    </script>
@endsection

