@extends('template.main')
@section('content')
        <!-- Konten Utama -->
        <div class="container mt-4">
            <h1>OasisApp | Data User</h1>
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
        <div><a href="/user/create" class="btn btn-success btn-sm mb-2">ADD USER</a></div>
        
        <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                @forelse ($alluser as $user)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->nama_lengkap }}</td>
                <td>
                    <a href="/user/edit/{{ $user->id }}" class="btn btn-primary btn-sm">edit</a> | <a href="/user/delete/{{ $user->id }}" class="btn btn-sm btn-danger">del</a>
                </td>
            </tr>
                @empty
                    <div class="alert alert-danger">
                        Data user belum tersedia
                    </div>
                @endforelse   
            </tbody>
          </table>
          {{ $alluser->links() }}
    </div>
    </center>
    
@endsection