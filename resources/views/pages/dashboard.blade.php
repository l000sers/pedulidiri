@extends('layouts.master')
@section('headline', 'Dashboard')
@section('title', 'Member Data')
@section('content')
    <div class="card-body">
        <div class="card p-5">
            <div class="card-header pb-5 d-block d-flex justify-content-between">
                <h3>Data Perjalanan</h3>
                <form class="form-inline" method="GET" action="/urutkan">
                    {{ csrf_field() }}
                    <div class="row">
                        <h5 class="mt-2 ml-3">Urutkan berdasarkan :</h5>
                        <select onchange="sortByCheck(this);" class="form-control form-select ml-3" type="" name="orderBy">>
                            <option value="lokasi">Lokasi</option>
                            <option value="suhu">Suhu</option>
                            <option value="tanggal">Tanggal</option>
                            <option value="jam">Jam</option>
                        </select>
                        <select onchange="sortByCheck(this);" class="form-control form-select mx-3" type="" name="sortBy">
                            <option value="asc" id="sortByAsc">A – Z</option>
                            <option value="desc" id="sortyByDesc">Z – A</option>
        
                        </select>
                        <button type="submit" class="btn btn-primary mx-3" id="btnSortBy">
                            Cari
                            <i class="fas fa-search pl-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tanggal
                        <div class="btn-group" role="group">
                            <button type="button" class="btn dropdown-toggle float-right text-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            </button>
                            <form action="/urut" method="GET">
                                @csrf
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <button class="dropdown-item" name="tanggalDesc" value="Desc"
                                        href="/urut">Terbaru</button>
                                    <button class="dropdown-item" name="tanggalAsc" value="Asc"
                                        href="/urut">Terlama</button>
                                </div>
                            </form>
                        </div>
                    </th>
                    <th scope="col">Kota</th>
                    <th scope="col">Suhu
                        <div class="btn-group" role="group">
                            <button type="button" class="btn dropdown-toggle float-right text-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            </button>
                            <form action="/urut" method="GET">
                                @csrf
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <button class="dropdown-item" name="suhuDesc" value="Desc" href="/urut">Suhu
                                        Tertinggi</button>
                                    <button class="dropdown-item" name="suhuAsc" value="Asc" href="/urut">Suhu
                                        Terendah</button>
                                </div>
                            </form>
                        </div>
                    </th>
                    <th scope="col">Jam
                        <div class="btn-group" role="group">
                            <button type="button" class="btn dropdown-toggle float-right text-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            </button>
                            <form action="/urut" method="GET">
                                @csrf
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <button class="dropdown-item" name="jamDesc" value="Desc" href="/urut">Terbaru</button>
                                    <button class="dropdown-item" name="jamAsc" value="Asc" href="/urut">Terlama</button>
                                </div>
                            </form>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $byzantine)
                    <tr>
                        {{-- <th scope="row">{{ $byzantine->id }}</th> --}}

                        <td>{{ $byzantine->tanggal }}</td>
                        <td>{{ $byzantine->lokasi }}</td>
                        <td>{{ $byzantine->suhu }}</td>
                        <td>{{ $byzantine->jam }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td
        </tr> --}}
            </tbody>
        </table>
        <div class="card-footer text-right">
            <a href="/form"><button class="btn btn-primary">Add Data</button></a>
        </div>
    </div>
<script>
    let btnSortBy = document.getElementById('btnSortBy');

    let sortByAsc = document.getElementById('sortByAsc');
    let sortByDesc = document.getElementById('sortyByDesc');

    function sortByCheck(that) {
        let value = that.value;

        if(value == "suhu"){
            sortByAsc.innerHTML = "Terkecil";
            sortByDesc.innerHTML = "Terbesar";
        } else if(value == "tanggal"){
            sortByAsc.innerHTML = "Terbaru";
            sortByDesc.innerHTML = "Terlama";
        } else if(value == "jam"){
            sortByAsc.innerHTML = "Terbaru";
            sortByDesc.innerHTML = "Terlama";
        } else if(value == "lokasi") {
            sortByAsc.innerHTML = "A_Z";
            sortByDesc.innerHTML = "Z_A";
        }
    }
</script>
@endsection