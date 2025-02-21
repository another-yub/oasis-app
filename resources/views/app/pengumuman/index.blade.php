@extends('template.main')
@section('content')
        <!-- Konten Utama -->
        <div class="container mt-4">
            <h1>OasisApp | Pengumuman</h1>
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
        <div><a href="/pengumuman/create" class="btn btn-success btn-sm mb-2">ADD PENGUMUMAN</a></div>
        
        <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Created As</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                @forelse ($allpengumuman as $pengumuman)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pengumuman->user_id }}</td>
                <td>{{ $pengumuman->judul }}</td>
                <td>{{ $pengumuman->isi }}</td>
                <td>
                    <a href="/pengumuman/edit/{{ $pengumuman->id }}" class="btn btn-primary btn-sm">edit</a> | <a href="/pengumuman/delete/{{ $pengumuman->id }}" class="btn btn-sm btn-danger">del</a>
                </td>
            </tr>
                @empty
                    <div class="alert alert-danger">
                        Data pengumuman belum tersedia
                    </div>
                @endforelse   
            </tbody>
          </table>
          {{ $allpengumuman->links() }}
    </div>
    </center>
    
@endsection