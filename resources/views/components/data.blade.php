@foreach($materials as $material)

@auth
<div class="collection_add">
    <select name="" id="collection_select">
        @foreach($collections as $collection)
        <option value="{{$collection->id}}">{{$collection->name}}</option>
        @endforeach
    </select>
    <button value="{{ $material->id }}" class="add_to_collection">Добавить</button>
</div>
@endauth
<a href="{{ route('material', $material->id) }}">
    @if($material->type == 'photo' ||$material->type == 'illustration')
    <img class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}" alt="">
    @else
    <video controls='true' class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}"
        alt=""></video>
    @endif
</a>
@auth @if(App\Models\Like::where([ ['users_id', '=' , Auth::user()->id],
['approved_ms_id', '=', $material->id],
])->exists())
<button
    onclick="like('{{$material->id}}', '{{ $material->users_id }}', '{{ $material->path }}', '{{ $material->type }}')"
    class="like_button liked">Понравилось</button>
@else
<button
    onclick="like('{{$material->id}}', '{{ $material->users_id }}', '{{ $material->path }}', '{{ $material->type }}')"
    class="like_button notliked">Понравилось</button>
@endif
@endauth
<p id="like_count">{{ $material->likes }}</p>
@php($lastId = $material->id)

@endforeach
@if(isset($lastId))
<input type="text" id='last_id' value="{{ $lastId }}" hidden>
@endif
<p hidden id="loading">загружаем ещё...</p>


<script>
function like(id, user_id, path, type) {
    $.ajax({
            url: "{{ route('like') }}",
            method: 'GET',
            data: {
                id: id,
                user_id: user_id,
                path: path,
                type: type
            },
            success: function(data) {
                console.log(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError) {})
}
$('body').on('click', '.like_button', function(e) {
    e.stopPropagation();
    e.stopImmediatePropagation();
    if ($(this).hasClass('liked')) {
        let likes = $(this).next().html();
        likes--;
        $(this).next().html(likes);
        $(this).removeClass('liked');
        $(this).addClass('notliked');
    } else {
        let likes = $(this).next().html();
        likes++;
        $(this).next().html(likes);
        $(this).removeClass('notliked');
        $(this).addClass('liked');
    }
})

function add(collections_id, approved_ms_id) {
    $.ajax({
            url: "{{ route('addotocollection') }}",
            method: 'GET',
            data: {
                collections_id: collections_id,
                approved_ms_id: approved_ms_id
            },
            success: function(data) {
                console.log(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError) {})
}
$('body').on('click', '.add_to_collection', function(e) {
    e.stopPropagation();
    e.stopImmediatePropagation();
    let collections_id = $(this).prev().val();
    let approved_ms_id = $(this).val();
    add(collections_id, approved_ms_id);
})
</script>