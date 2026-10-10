<h2>Edit Buku</h2>
<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Judul Buku:</label>
    <input type="text" id="title" name="title" value="{{ $book->title }}">
    <label for="author">Penulis:</label>
    <input type="text" id="author" name="author" value="{{ $book->author }}">
    <label for="year">Tahun Terbit:</label>
    <input type="number" id="year" name="year" value="{{ $book->year }}">
    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" value="{{ $book->stok }}">

    <button type="submit">
        Update
    </button>
</form>
