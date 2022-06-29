@extends('guru.supervisor.layout.main')
@section('supervisor')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('supervisor', '=', Auth::user()->name)
->get();

$cek = count($jadwal);

@endphp

<div class="overflow-x-auto rounded-lg border">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th>Guru</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Berkas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($cek == 0)
            <tr>
                <td colspan="6" class="text-center">Belum Terjadwal</td>
            </tr>
            @else
            @foreach($jadwal as $row)
            <tr>
                <th>{{ ++$i }}</th>
                <td>{{ $row->guru }}</td>
                <td>{{ $row->jadwal }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->berkas }}</td>
                <td>
                    @if($row->berkas == 'Belum' || $row->status == 'Selesai' || $row->jadwal != date('Y-m-d'))
                    <button disabled class="btn btn-sm btn-primary">supervisi</button>
                    @else
                    <a href="{{ route('supervisi', $row->id) }}" class="btn btn-sm btn-primary">supervisi</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection