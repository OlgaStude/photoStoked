@if(isset($messages))
@foreach($messages as $message)
<div id="message">
    <a href="{{ url('userpage/'.$message->user_send_id) }}"><img id="message_pfp" src="{{ asset('storage/profile_pics/'.$message->path) }}" alt=""></a>
    <p>{{$message->text}}</p>
    <img id="del_btn" onclick="delete_mess('{{$message->id}}')" src="{{ asset('storage/img/mess_del_btn.png') }}" alt="">
</div>
@endforeach
@endif