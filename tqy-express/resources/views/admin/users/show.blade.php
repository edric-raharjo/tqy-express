 
@extends('layouts.app')

@section('title', 'View User')

@section('content')
<div class="container">
    <h1 class="mb-4">User Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->user_id }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Date Created:</strong> {{ $user->date_created }}</p>
        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
