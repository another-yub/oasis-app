@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Edit Kandidat </h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('kandidat.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $kandidat->id }}">
        <div class="mb-1">
            <a href="/kandidat" class="btn btn-sm btn-secondary"><< kembali</a>

        </div>
    <div class="mt-2">
        <label for="nama_kandidat">Nama Kandidat : </label>
        <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control" required value="{{ $kandidat->nama_kandidat }}">
    </div>
    <div class="mt-2">
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ $kandidat->kelas }}">
    </div>
    <div class="mt-2">
        <label for="visi">Visi : </label>
        <input type="text" name="visi" id="visi" class="form-control" required value="{{ $kandidat->visi }}">
    </div>
    <div class="mt-2">
        <label for="misi">Misi : </label>
        <input type="text" class="form-control" name="misi" id="misi" required value="{{ $kandidat->misi }}">
    </div> 
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>              
</div>
</form>

@endsection