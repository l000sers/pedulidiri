@extends('layouts.master')
@section('headline','Create New Data')
@section('title','Register Form')
@section('content')
<form action="/simpanPerjalanan" method="POST">
{{ csrf_field() }}
    <div class="card-body">
        <div class="form-row">
            {{-- <div class="form-group col-md-2">
                <label for="inputZip">ID User</label>
                <input type="text" class="form-control" id="inputZip"  placeholder="03142" name="id_user">
            </div> --}}
            <div class="form-group col-md-4">
                <label for="inputCity">Tanggal</label>
                <input type="date" class="form-control" id="inputCity" name="tanggal">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Jam</label>
                <input type="time" class="form-control" id="inputCity" name="jam">
            </div>
            
            <div class="form-group col-md-2">
                <label for="inputZip">Suhu</label>
                <input type="text" class="form-control" id="inputZip" name="suhu">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Lokasi yang dikunjungi</label>
            <input type="text" class="form-control" id="inputAddress" name="lokasi">
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Submit</button>
    </div>
</div>
</form>

@endsection
