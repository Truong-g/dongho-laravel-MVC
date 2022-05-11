@if(session('message'))
@php
    $strarr = session('message')
@endphp
<div class="alert alert-{{$strarr['typemsg']}}">
    {{$strarr['msg']}}
</div>
@endif