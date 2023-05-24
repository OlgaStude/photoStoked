@foreach($users_collections as $collection)
<div class="collection_item">
    
    @if($collection->path != '')
    <a class="collection_cover_a" href="{{ url('collection/'.$collection->id) }}"><div class="shadow"></div><img class="collection_cover_img" src="{{ asset('storage/approved_materials/'.$collection->path)}}" alt=""></a>
    @else
    <a href="{{ url('collection/'.$collection->id) }}"><div class="collection_cover">
        
    </div></a>
    @endif
    <div class="buttom_part">

        <p><a href="{{ url('collection/'.$collection->id) }}">{{ $collection->name }}</a></p>
        @php($lastId = $collection->id)
        
        <div onclick="collection_delete('{{ $collection->id }}')" class="delete_btn">
            <span>-</span>
        </div>
    </div>
</div>
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