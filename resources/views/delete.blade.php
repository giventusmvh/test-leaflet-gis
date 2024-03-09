<!-- resources/views/lokasi/delete.blade.php -->

@extends('layouts.app')

@section('title', 'Hapus Lokasi')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Yakin Hapus Lokasi?</h2>
            <p>Latitude: {{ $lokasi->latitude }}</p>
            <p>Longitude: {{ $lokasi->longitude }}</p>
            <form action="/lokasi/destroy/{{ $lokasi->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="/" class="btn btn-secondary">Batal</a>
            </form>
        </div>
        <div class="col-md-6">
            <!-- Map section or any other content as needed -->
        </div>
    </div>
@endsection
