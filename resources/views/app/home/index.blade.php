@extends('template.main')
@section('content')
<div class="container mt-4">
    <h1>Welcome OasisApp</h1>
    <p>Ini adalah program pemilihan osis berbasis tech.</p>
</div>
@if (session('successlogin'))
<div class="alert alert-success container">
    <strong>Success!! </strong> {{ session('successlogin') }}
</div>
@endif
<center>
    <div class="mt-5 container">
        <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kandidat</th>
                <th scope="col">Visi</th>
                <th scope="col">Misi</th>
                <th scope="col">Perolehan Suara</th>
                <th scope="col">Persentase</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                @forelse ($allkandidat as $kandidat)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kandidat->nama_kandidat }}</td>
                <td>{{ $kandidat->visi }}</td>
                <td>{{ $kandidat->misi }}</td>
                @foreach ($totalSuara as $total)
                <td>{{ $total['perolehan_suara'] }}</td>
                <td>{{ $total['persentase'] }}</td>
                @endforeach
            </tr>
                @empty
                    <div class="alert alert-danger">
                        Data kandidat belum tersedia
                    </div>
                @endforelse   
            </tbody>
          </table>
    </div>
    </center>
@endsection