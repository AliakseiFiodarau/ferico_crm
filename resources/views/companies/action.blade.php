<a type="button" href="{{ route('companies.edit',$id) }}" class="btn edit btn-success edit">
    {{__("Edit")}}
</a>
<a type="button" data-id="{{ $id }}" class="btn delete btn-danger">
    {{__("Delete")}}
</a>
