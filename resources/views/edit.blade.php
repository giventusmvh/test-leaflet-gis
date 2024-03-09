<!-- resources/views/lokasi/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Lokasi')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/lokasi/update/{{ $lokasi->id }}" method="post">
                @csrf
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" value="{{ $lokasi->latitude }}" required>
                <br>
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" value="{{ $lokasi->longitude }}" required>
                <br>
                <button type="submit">Update Lokasi</button>
            </form>
        </div>
        <div class="col-md-6">
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>

    <script>
        var map = L.map('map').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], { draggable: true }).addTo(map);

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat.toFixed(6);
            document.getElementById('longitude').value = position.lng.toFixed(6);
        });
    </script>
@endsection
