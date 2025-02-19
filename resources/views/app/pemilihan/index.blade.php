@extends('template.main')
@section('content')
        <!-- Konten Utama -->
        <div class="container mt-4">
            <h1>OasisApp | Pemilihan Kandidat</h1>
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
    <div class="mt-5 container">
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
                    <a href="/pemilihan/edit/{{ $kandidat->id }}" class="btn btn-success">pilih</a>
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