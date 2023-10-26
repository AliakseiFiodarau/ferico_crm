@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__("Manage Employees")}}</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.delete', function (event) {
            if (confirm("{{__("Delete this employee?")}}") === true) {
                const id = $(event.currentTarget).data('id');

                $.ajax({
                    url: id,
                    type: "DELETE",
                    data: {"_token": "{{ csrf_token() }}"},
                    success: function (response) {
                        $('#employee-table').DataTable().ajax.reload(null, false);
                    }
                });
            }
        });
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
