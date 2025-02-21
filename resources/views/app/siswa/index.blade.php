@extends('template.main')
@section('content')
        <!-- Konten Utama -->
        <div class="container mt-4">
            <h1>OasisApp | Data Siswa</h1>
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
        <div><a href="/siswa/create" class="btn btn-success btn-sm mb-2">ADD SISWA</a></div>
        
        <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Nis</th>
                <th scope="col">Kelas</th>
                <th scope="col">Status Memilih</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                @forelse ($allsiswa as $siswa)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $siswa->user->nama_lengkap }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->kelas }}</td>
                @if ($siswa->status_memilih == 'belum')
                <td id="belum">{{ $siswa->status_memilih }} </td>
                @elseif ($siswa->status_memilih == 'sudah')
                <td id="sudah">{{ $siswa->status_memilih }} </td>
                @endif
                <td>
                    <a href="/siswa/edit/{{ $siswa->id }}" class="btn btn-primary btn-sm">edit</a> | <a href="/siswa/delete/{{ $siswa->id }}" class="btn btn-sm btn-danger">del</a>
                </td>
            </tr>
                @empty
                    <div class="alert alert-danger">
                        Data siswa belum tersedia
                    </div>
                @endforelse   
            </tbody>
          </table>
          {{ $allsiswa->links() }}
    </div>
    </center>
    
@endsection