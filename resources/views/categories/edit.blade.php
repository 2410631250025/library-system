<h2>Edit Kategori Buku</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Kategori:</label><br>
            <input type="text" name="name" value="{{ $category->name }}" required>
        </div>
        
        <button type="submit">Update</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </form>
