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

    <div>
        <label for="category_id">Kategori</label> 
        
        <select name="category_id" id="category_id">    
            <option value="">Pilih kategori</option>    
            
            @foreach ($categories as $category)        
                <option            
                    value="{{ $category->id }}"            
                    @selected(old('category_id') == $category->id)        
            >            
                    {{ $category->name }}        
                </option>    
            @endforeach 
        </select> 
        
        @error('category_id')    
            <p>{{ $message }}</p> 
        @enderror
    </div>

    <button type="submit">Simpan</button>
        
    <a href="{{ route('books.index') }}">Batal</a>
</form>
