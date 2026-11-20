@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
<div style="margin-bottom: 20px;">
    <h2 style="color: #633A2C; margin: 0;">Daftar Pengguna</h2>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px;">
    @foreach($users as $user)
        <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid {{ $user->role === 'admin' ? '#800000' : '#B8842C' }};">
            <span style="display: inline-block; background: {{ $user->role === 'admin' ? '#800000' : '#F3EAD8' }}; color: {{ $user->role === 'admin' ? '#fff' : '#633A2C' }}; padding: 3px 10px; border-radius: 15px; font-size: 0.78rem; font-weight: bold; text-transform: uppercase; margin-bottom: 8px;">
                {{ $user->role ?? 'user' }}
            </span>
            <h3 style="color: #633A2C; margin: 0 0 6px 0; font-size: 1.15rem;">{{ $user->name }}</h3>
            <p style="margin: 0; font-size: 0.92rem; color: #555;">{{ $user->email }}</p>
        </div>
    @endforeach
</div>

<div style="margin-top: 20px;">
    {{ $users->links() }}
</div>
@endsection