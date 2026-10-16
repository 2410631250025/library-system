<h2>Tambah Anggota Baru</h2>
<form action="{{ route('members.store') }}" method="POST">
    @csrf
    @method('POST')

    <div>
        <label for="name">Nama Anggota:</label>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

        <div>
        <label for="email">Email:</label>
        <input 
            type="email" 
            name="email" 
            value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

        <div>
        <label for="phone">Phone:</label>
        <input 
            type="text" 
            name="phone" 
            value="{{ old('phone') }}">
        @error('phone')
            <p>{{ $message }}</p>
        @enderror
    </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
