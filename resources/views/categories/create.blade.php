<h2>Tambah Kategori Buku</h2>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    @method('POST')

    <div>
        <label for="name">Nama Kategori:</label>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </form>
