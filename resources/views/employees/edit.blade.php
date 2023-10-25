@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Employee</div>
            <div class="card-body">
                <form id="edit-form"
                      action="{{ route('employees.update',$employee->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row flex-column align-items-center">
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>First Name</strong>
                                <input type="text" name="first_name" value="{{ $employee->first_name }}"
                                       class="form-control"
                                       placeholder="Employee First Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>Last Name</strong>
                                <input type="text" name="last_name" value="{{ $employee->last_name }}"
                                       class="form-control"
                                       placeholder="Employee Last Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>Company</strong>
                                <select name="company_id" class="form-select">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}"
                                                @if ($employee->company_id === $company->id)
                                                    selected = "selected"
                                            @endif
                                        >{{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="Employee Email"
                                       value="{{ $employee->email }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>Phone</strong>
                                <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control"
                                       placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-4 m-2">
                            <div class="form-group">
                                <strong>Note</strong>
                                <label for="note"></label>
                                <textarea class="form-control" name="note" id="note"
                                          rows="4">{{ $employee->note }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary ml-3 w-25 m-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#form-edit").submit(function (event) {
            event.preventDefault();
            const id = {{$employee->id}};

            $.ajax({
                url: "/employees/" + id,
                type: "PUT",
                cache: false,
                dataType: "json",
                data: $('#form-edit').serialize(),
                success: function () {
                    alert("Employee {{$employee->first_name}} {{$employee->first_name}} has been updated")
                },
                error: function () {
                    alert("Something gone wrong");
                }
            });
        });
    </script>
@endsection

