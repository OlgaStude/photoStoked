@foreach($materials as $material)


<div class="material_container">
    <div class="material_wrapper">

        @auth
        <div class="bottom_material">
            <div class="material_author">
                <a href="{{ url('userpage/'. $material->users_id) }}"><img src="{{ asset('storage/profile_pics/'.App\Models\User::find($material->users_id)->path)}}" alt=""></a>
                <a href="{{ url('userpage/'. $material->users_id) }}"><span>{{ App\Models\User::find($material->users_id)->nikname }}</span></a>
            </div>
            <div class="likes_for_material">

                <span class="like_count">{{ $material->likes }}</span>
                
                @if(App\Models\Like::where([ ['users_id', '=' , Auth::user()->id],
                ['approved_ms_id', '=', $material->id],
                ])->exists())
                <div class="liked">

                    <img onclick="like('{{$material->id}}', '{{ $material->users_id }}', '{{ $material->path }}', '{{ $material->type }}')"
                    class="like_button" src="{{ asset('storage/img/heart_like.png') }}" alt="">
                </div>
                @else
                <div class="notliked">
                
                    <img onclick="like('{{$material->id}}', '{{ $material->users_id }}', '{{ $material->path }}', '{{ $material->type }}')"
                        class="like_button" src="{{ asset('storage/img/heart_like.png') }}" alt="">
                </div>
                @endif
            </div>
        </div>
        <div class="collection_add">
        @if(isset($collections[0]))
            <select class="collection_select_style" name="" id="collection_select">
                @foreach($collections as $collection)
                <option value="{{$collection->id}}">{{$collection->name}}</option>
                @endforeach
            </select>
            <button value="{{ $material->id }}" class="add_to_collection">Добавить</button>
        @else
            <select class="collection_select_style" name="" id="collection_select">
                <option value="">У вас пока нет коллекций</option>
            </select>
        @endif
        </div>
        @endauth
        @guest
        <div class="bottom_material">
            <div class="material_author">
                <a href="{{ url('userpage/'. $material->users_id) }}"><img src="{{ asset('storage/profile_pics/'.App\Models\User::find($material->users_id)->path)}}" alt=""></a>
                <a href="{{ url('userpage/'. $material->users_id) }}"><span>{{ App\Models\User::find($material->users_id)->nikname }}</span></a>
            </div>
            <div class="likes_for_material">

            <span class="like_count">{{ $material->likes }}</span>
            <div class="notliked">
        
                <img src="{{ asset('storage/img/heart_like.png') }}" alt="">
            </div>
            </div>
        </div>
        @endguest
    <a class="a_material" href="{{ route('material', $material->id) }}">
        <div class="black_gradient"></div>
        @if($material->type == 'photo' ||$material->type == 'illustration')
        <img class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}" alt="">
        @else
        <video class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}"
        alt=""></video>
        @endif
    </a>
    
</div>
</div>

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
    if ($(this).parent().hasClass('liked')) {
        let likes = $(this).parent().prev().html();
        likes--;
        $(this).parent().prev().html(likes);
        $(this).parent().removeClass('liked');
        $(this).parent().addClass('notliked');
    } else {
        let likes = $(this).parent().prev().html();
        likes++;
        $(this).parent().prev().html(likes);
        $(this).parent().removeClass('notliked');
        $(this).parent().addClass('liked');
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