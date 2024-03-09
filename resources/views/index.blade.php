@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/lokasi/store" method="post">
                @csrf
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" required>
                <br>
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" required>
                <br>
                <button type="submit">Simpan Lokasi</button>
            </form>
        </div>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lokasis as $lokasi)
                    <tr>
                        <td>{{ $lokasi->latitude }}</td>
                        <td>{{ $lokasi->longitude }}</td>
                        <td>
                            <a href="/lokasi/edit/{{ $lokasi->id }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/lokasi/confirm-delete/{{ $lokasi->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this location?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-6">
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>

    <script>
        var map = L.map('map').setView([-6.2088, 106.8456], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        @foreach($lokasis as $lokasi)
            var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}]).addTo(map);
            marker.bindPopup(`
                Latitude: {{ $lokasi->latitude }}<br>
                Longitude: {{ $lokasi->longitude }}<br>
                <a href="/lokasi/edit/{{ $lokasi->id }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/lokasi/confirm-delete/{{ $lokasi->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this location?')">Delete</a>
            `);
        @endforeach

        map.on('click', function(e) {
            var latitude = e.latlng.lat.toFixed(6);
            var longitude = e.latlng.lng.toFixed(6);

            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        });
    </script>
    
@endsection
