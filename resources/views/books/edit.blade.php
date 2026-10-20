<h2>Edit Buku</h2>
<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')

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
            value="{{ old('author') ?? $book->author }}">
        @error('author')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="year">Tahun Terbit:</label>
        <input 
            type="number" 
            name="year" 
            value="{{ old('year') ?? $book->year }}">
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
            value="{{ old('stok') ?? $book->stok }}">
        @error('stok')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category_id">Kategori</label> 
        <select name="category_id" id="category_id">    
           @foreach ($categories as $category)
                <option        
                        value="{{ $category->id }}"        
                        @selected(old('category_id', $book->category_id) == $category->id)    
                >        
                        {{ $category->name }}    
                    </option> 
            @endforeach
        </select>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">
        Update
    </button>
    <a href="{{ route('books.index') }}">
        <button type="button">
            Batal
        </button>
    </a>
</form>
