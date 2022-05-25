@extends('layouts.master')
@section('headline','Dashboard')
@section('title','Member Data')
@section('content')
<div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $ucok)
        <tr>
          <th scope="row">{{$ucok->id}}</th>
          <td>{{$ucok->name}}</td>
          <td>{{$ucok->email}}</td>
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
      <a href="/register"><button class="btn btn-primary">Add Member</button></a>
    </div>
  </div>
@endsection
