    @extends('layouts.app')
    @section('title', 'Data Member')
    @section('content')

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('members.create') }}">+ Tambah Anggota Baru</a>
        
        <h2>Data Anggota</h2>
    <ul>
    @foreach($members as $member)
    <li>
        <p>Nama: {{ $member->name }}</p>
        <p>Email: {{ $member->email }}</p>
        <p>Telepon: {{ $member->phone }}</p>

            <a href="{{ route('members.edit', $member) }}" >
                <button type="button">Edit</button>
            </a>

            <form action="{{ route('members.destroy', $member) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit">
                    Hapus
                </button>
            </form>
    </li>
    @endforeach
    </ul>

    @endsection
