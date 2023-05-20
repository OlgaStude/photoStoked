@foreach($users_collections as $collection)
<p><a href="{{ url('collection/'.$collection->id) }}">{{ $collection->name }}</a></p>
@if($collection->path != '')
<img class="collection_cover" src="{{ asset('storage/approved_materials/'.$collection->path)}}" alt="">
@else
<div>

</div>
@endif
@php($lastId = $collection->id)

<button onclick="collection_delete('{{ $collection->id }}')">Удалиь коллекцию</button>
@endforeach
@if(isset($lastId))
<input type="text" id='last_id' value="{{ $lastId }}" hidden>
@endif

<script>
function loadMoreData(id = "") {
    $.ajax({
            url: '{{ route("collections") }}',
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                $("#loading").remove();
                $("#last_id").remove();

                console.log(data);

                $("#collections").append(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError) {
            $("#loading").remove();
        })
}
$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1) {
        $("#loading").show();

        let id = $("#last_id").val();
        loadMoreData(id);
    }
})

function collection_delete(id) {
    $.ajax({
            url: "{{ route('deletecollection') }}",
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#collections').empty().append(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError) {})
}
</script>