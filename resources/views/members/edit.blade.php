<h2>Edit Anggota</h2>

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        
    <div>
        <label for="name">Nama Anggota:</label>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name', $member->name) }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input 
            type="email" 
            name="email" 
            value="{{ old('email', $member->email) }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="phone">Telepon:</label>
        <input 
            type="text" 
            name="phone" 
            value="{{ old('phone', $member->phone) }}">
        @error('phone')
            <p>{{ $message }}</p>
        @enderror
    </div>
        
        <button type="submit">Update</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
