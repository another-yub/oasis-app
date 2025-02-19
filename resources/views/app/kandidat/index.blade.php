@extends('template.main')
@section('content')
        <!-- Konten Utama -->
        <div class="container mt-4">
            <h1>OasisApp | Data Kandidat</h1>
            <p>Ini adalah program pemilihan osis berbasis tech.</p>
        </div>
        <div>

        @if (session('success'))
            <div class="alert alert-success container alert-dismissible fade show">
                <strong>Success!! </strong> {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger container alert-dismissible fade show">
                <strong>Failure!! </strong>{{ session('error') }}
            </div>
        @endif

    </div>

<center>
    <div class="container">
        <div><a href="/kandidat/create" class="btn btn-success btn-sm mb-2">ADD KANDIDAT</a></div>
        
        <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kandidat</th>
                <th scope="col">Kelas</th>
                <th scope="col">Visi</th>
                <th scope="col">Misi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                @forelse ($allkandidat as $kandidat)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kandidat->nama_kandidat }}</td>
                <td>{{ $kandidat->kelas }}</td>
                <td>{{ $kandidat->visi }}</td>
                <td>{{ $kandidat->misi }}</td>
                <td>
                    <a href="/kandidat/edit/{{ $kandidat->id }}" class="btn btn-primary btn-sm">edit</a> | <a href="/kandidat/delete/{{ $kandidat->id }}" class="btn btn-sm btn-danger">del</a>
                </td>
            </tr>
                @empty
                    <div class="alert alert-danger">
                        Data kandidat belum tersedia
                    </div>
                @endforelse   
            </tbody>
          </table>
          {{ $allkandidat->links() }}
    </div>
    </center>
    
@endsection