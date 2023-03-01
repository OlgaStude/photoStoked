@foreach($materials as $material)
    @if($material->type == 'photo' ||$material->type == 'illustration')
    <img  src="{{ asset('storage/approved_materials/'.$material->path)}}" alt="">
    @else
    <video src="{{ asset('storage/approved_materials/'.$material->path)}}" alt=""></video>
    @endif
    @php($lastId = $material->id)
@endforeach
<input type="text" id='last_id' value="{{ $lastId }}" hidden>