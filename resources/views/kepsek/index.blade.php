@extends('kepsek.layout.main')
@section('body')
<a class="border border-error btn-outline btn-error" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endsection