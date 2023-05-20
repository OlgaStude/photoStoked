@foreach($tags as $tag)
<p><a href="#" class="tag_link">{{ $tag->tag_name }}</a></p>
@php($last_tag_id = $tag->id)
@endforeach
@if(isset($last_tag_id))
        <button id="tag_btn" value="{{ $last_tag_id }}">другие метки</button>
@endif
