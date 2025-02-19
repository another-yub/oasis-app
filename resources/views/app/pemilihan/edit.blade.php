@extends('template.main')
@section('content')
    
    <div class="container mt-4">
        <h1>OasisApp | Pilih Kandidat </h1>
        <p>Ini adalah program pemilihan osis berbasis tech.</p>
    </div>
    <div class="container">
    <form action="{{ route('pemilihan.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $kandidat->id }}">
    <div class="mt-5">
        <label for="nama_kandidat">Nama Kandidat : </label>
        <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control" required value="{{ $kandidat->nama_kandidat }}" readonly>
    </div>
    <div class="mt-2">
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ $kandidat->kelas }}" readonly>
    </div>
    <div class="mt-2">
        <label for="visi">Visi : </label>
        <input type="text" name="visi" id="visi" class="form-control" required value="{{ $kandidat->visi }}" readonly>
    </div>
    <div class="mt-2">
        <label for="misi">Misi : </label>
        <input type="text" class="form-control" name="misi" id="misi" required value="{{ $kandidat->misi }}" readonly>
    </div> 
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Pilih</button>
        <a href="/pemilihan" class="btn btn-secondary">kembali</a>
    </div>              
</div>
</form>

@endsection