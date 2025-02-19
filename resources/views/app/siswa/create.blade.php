@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Add Siswa </h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-1">
            <a href="/siswa" class="btn btn-sm btn-secondary"><< kembali</a>

        </div>
        <div class="mt-2">
            <label for="nama_lengkap">Nama Lengkap : </label>
            <select name="nama_lengkap" id="nama_lengkap" class="form-control">
                @foreach ($alluser as $user)
                <option value="{{ $user->id }}" {{ $user->role == 'siswa' ? 'selected' : '' }}>{{ $user->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
    <div class="mt-2">
        <label for="nis">Nis : </label>
        <input type="text" name="nis" id="nis" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="status_memilih">Status Memilih : </label>
        <select name="status_memilih" id="status_memilih" class="form-control" required>
            <option value="sudah">sudah</option>
            <option value="belum">belum</option>
        </select>
    </div>  
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>              
</div>
</form>

@endsection