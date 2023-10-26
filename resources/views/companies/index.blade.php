@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__("Manage Companies")}}</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.delete', function (event) {
            if (confirm("{{__("Delete this company?")}}") === true) {
                const id = $(event.currentTarget).data('id');

                $.ajax({
                    url: id,
                    type: "DELETE",
                    cache: false,
                    data: {"_token": "{{ csrf_token() }}"},
                    success: function (response) {
                        $('#company-table').DataTable().ajax.reload(null, false);
                    }
                });
            }
        });
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
