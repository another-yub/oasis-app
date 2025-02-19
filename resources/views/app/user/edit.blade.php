@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Edit User</h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-1">
            <a href="/user" class="btn btn-sm btn-secondary"><< kembali</a>

        </div>
    <div class="mt-2">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" class="form-control" required value="{{ $user->username }}">
    </div>
    <div class="mt-2">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ $user->nama_lengkap }}">
    </div>
    <div class="mt-2">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ $user->email }}">
    </div>
    <div class="mt-2">
        <label for="password">Password : </label>
        <input type="text" class="form-control" name="password" id="password" placeholder="Opsional">
    </div>
    <div class="mt-2">
        <label for="role">Role : </label>
        <select name="role" id="role" class="form-control" required>
            <option value="siswa"{{ $user->role == 'siswa' ? 'selected' : '' }}>siswa</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
        </select>
    </div>  

    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>              
</div>
</form>

@endsection