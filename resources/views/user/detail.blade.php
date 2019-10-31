@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card-deck">
        <div class="card">
            <h3 class="card-header">Profile</h3>
            <div class="card-body">
                <form method="post" action="/profile">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="loyalty">Loyalty points</label>
                        <p>{{ $user->loyalty_points }}</p>
                    </div>
                    <button type="submit" class="btn btn-success">Update profile</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>

        <div class="card">
            <h3 class="card-header">Change password</h3>
            <div class="card-body">
                <form method="post" action="/profile/password">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Old password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirm">Confirm new password</label>
                        <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" required>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">Make sure it's at least 15 characters OR at least 8 characters including a number and a lowercase letter.</small>
                    <br>
                    <button type="submit" class="btn btn-success">Update password</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
