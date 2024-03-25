
@extends('layouts.karyawanapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #ac6bfa;color:white">Riwayat Cuti</div>

                    <div class="card-body" style="background-color: #c0c0f5">
                        @if($cuti->isEmpty())
                            <p>Tidak ada riwayat cuti.</p>
                        @else
                            <table class="table">
                                <div class="d-flex">
                                    <a href="/karyawan/cuti" class="btn btn" role="button" style="background-color:#7931d1;color:white">Ajukan Cuti</a>
                                </div>
                                <br/>

                                <thead>
                                    <tr>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cuti as $cutis)
                                        @if($cutis->karyawan->user_id == Auth::id())
                                            <tr>
                                                <td>{{ $cutis->tanggal_mulai }}</td>
                                                <td>{{ $cutis->tanggal_selesai }}</td>
                                                <td>{{ $cutis->alasan_cuti }}</td>
                                                <td><button class="btn {{ app('App\Http\Controllers\PresensiKaryawanController')->getStatusColorClass($cutis->status) }}">{{ ucfirst($cutis->status) }}</button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
