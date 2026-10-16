<h2>Tambah Buku Baru</h2>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    @method('POST')

    <div>
        <label for="title">Judul Buku:</label>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title') }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="author">Penulis:</label>
        <input 
            type="text" 
            id="author" 
            name="author" 
            value="{{ old('author') }}">
        @error('author')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="year">Tahun Terbit:</label>
        <input 
            type="number" 
            name="year" 
            value="{{ old('year') }}">

        @error('year')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="stok">Stok:</label>
        <input 
            type="number" 
            name="stok" 
            placeholder="Stok Buku"
            value="{{ old('stok') }}">
            
        @error('stok')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Simpan</button>
        
    <a href="{{ route('books.index') }}">Batal</a>
</form>
