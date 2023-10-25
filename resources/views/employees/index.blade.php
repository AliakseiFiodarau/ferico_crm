@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Employees</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.delete', function (event) {
            if (confirm("Delete employee?") === true) {
                const id = $(event.currentTarget).data('id');

                $.ajax({
                    url: 'employees/' + id,
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
