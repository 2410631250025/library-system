@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengguna</h2>
    
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>

    {{ $users->links() }}
</div>
@endsection