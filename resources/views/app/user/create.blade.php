@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Add User </h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-1">
            <a href="/user" class="btn btn-sm btn-secondary"><< kembali</a>

        </div>
    <div class="mt-2">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="password">Password : </label>
        <input type="text" class="form-control" name="password" id="password" required>
    </div>
    <div class="mt-2">
        <label for="role">Role : </label>
        <select name="role" id="role" class="form-control" required>
            <option value="admin">admin</option>
            <option value="siswa">siswa</option>
        </select>
    </div>  
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>              
</div>
</form>

@endsection