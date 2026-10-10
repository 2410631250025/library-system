<h2>Tambah Buku Baru</h2>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    @method('POST')

    <label for="title">Judul Buku:</label>
    <input type="text" id="title" name="title">
    <label for="author">Penulis:</label>
    <input type="text" id="author" name="author">
    <label for="year">Tahun Terbit:</label>
    <input type="number" id="year" name="year">
    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok">

    <button type="submit">
        Simpan
    </button>
</form>
