@foreach($pop_materials as $material)
<a href="{{ route('material', $material->id) }}">

    @if($material->type == 'photo' ||$material->type == 'illustration')
    <img class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}" alt="">
    @else
    <video controls='true' class="material" src="{{ asset('storage/approved_materials/'.$material->path)}}"
        alt=""></video>
    @endif
</a>
@auth
@if(App\Models\Like::where([
['users_id', '=', Auth::user()->id],
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

@endforeach



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
</script>