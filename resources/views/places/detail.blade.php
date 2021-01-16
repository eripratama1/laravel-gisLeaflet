@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail Place</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr><td>Nama Tempat</td><td>{{ $place->place_name }}</td></tr>
                            <tr><td>Alamat</td><td>{{ $place->address }}</td></tr>
                            <tr><td>Alamat</td><td>{{ $place->description }}</td></tr>
                        </tbody>
                        <td><a href="{{ route('frontpage') }}" class="btn btn-secondary">Kembali</a></td>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail Place</div>
                <div class="card-body" id="mapid"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('styles')
<!-- Leaflet CSS -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
    <style>
      #mapid { min-height: 500px; }
    </style>
@endsection

@push('scripts')

<!-- Leaflet JavaScript -->
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin="">
      </script>

<script>
   var map = L.map('mapid').setView([{{ $place->latitude }},{{ $place->longitude }}],{{ config('leafletsetup.detail_zoom_level') }});

   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $place->latitude }},{{ $place->longitude }}]).addTo(map)

    axios.get('{{ route('api.places.index') }}')
    .then(function (response) {
        //console.log(response.data);
        L.geoJSON(response.data,{
            pointToLayer: function(geoJsonPoint,latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function(layer) {
            //return layer.feature.properties.map_popup_content;
            return ('<div class="my-2"><strong>Place Name</strong> :<br>'+layer.feature.properties.place_name+'</div> <div class="my-2"><strong>Description</strong>:<br>'+layer.feature.properties.description+'</div><div class="my-2"><strong>Address</strong>:<br>'+layer.feature.properties.address+'</div>');
        }).addTo(map);
        console.log(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });

</script>
@endpush

