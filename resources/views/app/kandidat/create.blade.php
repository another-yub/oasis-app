@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Add Kandidat </h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('kandidat.store') }}" method="POST">
        @csrf
        <div class="mb-1">
            <a href="/kandidat" class="btn btn-sm btn-secondary"><< kembali</a>

        </div>
    <div class="mt-2">
        <label for="nama_kandidat">Nama Kandidat : </label>
        <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="visi">Visi : </label>
        <input type="text" name="visi" id="visi" class="form-control" required>
    </div>
    <div class="mt-2">
        <label for="misi">Misi : </label>
        <input type="text" class="form-control" name="misi" id="misi" required>
    </div> 
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>              
</div>
</form>

@endsection