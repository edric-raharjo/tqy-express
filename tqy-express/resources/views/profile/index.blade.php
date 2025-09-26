{{-- resources/views/profile/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">My Profile</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>User ID:</strong> {{ $user->user_id }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Date Created:</strong> {{ $user->date_created }}</p>
        </div>
    </div>
</div>
@endsection
