@extends('guru.guru.layout.main')
@section('guru')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('guru', '=', Auth::user()->name)
->where('berkas', '=', 'Belum')
->get();

$cek = count($jadwal);

@endphp

<form action="{{ route('berkas.store') }}" method="post" class="form-control w-full">
    @csrf
    <label class="label">
        <span class="label-text">Nama Guru</span>
    </label>
    <input disabled type="text" placeholder="" class="input input-bordered w-full" value="{{ Auth::user()->name }}" />
    <input name="nama_guru" type="text" class="hidden" value="{{ Auth::user()->name }}" />
    <label class="label mt-5">
        <span class="label-text">Mata Pelajaran</span>
    </label>
    <input name="mata_pelajaran" type="text" placeholder="" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Kompetensi Dasar</span>
    </label>
    <input name="kompetensi_dasar" type="text" placeholder="" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Materi</span>
    </label>
    <input name="materi" type="text" placeholder="" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Rombel/Semester</span>
    </label>
    <input name="rombel" type="text" placeholder="" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Jadwal</span>
    </label>
    <select name="jadwal" class="select select-bordered w-full">
        <option disabled selected>-- Pilih Jadwal --</option>
        @foreach($jadwal as $row)
        <option value="{{ $row->jadwal }}" @if($row->jadwal == date('Y-m-d'))selected @endif>{{ $row->jadwal }}</option>
        @endforeach
    </select>
    @if($cek > 0)
    <button type="submit" class="btn bg-[#570DF8] btn-primary mt-9 hover:shadow-lg hover:shadow-[#ab88f7]">
        Upload
    </button>
    @else
    <button disabled class="btn bg-[#570DF8] btn-primary mt-9">Anda hanya bisa upload jika sudah terjadwal</button>
    @endif
</form>


@endsection