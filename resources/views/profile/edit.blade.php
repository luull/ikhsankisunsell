@extends('partials.app')

@section('title', 'Edit Profile')

@section('content')

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="validation" novalidate>
    @csrf
        <div class="form-group">
          <label for="exampleInputName1">Nama</label>
          <input type="text" name="name" class="form-control" id="Name" value="{{ old('name',$user->name) }}" aria-describeby="nameHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputNumber1">No Handphone</label>
            <input type="text" inputmode="numeric" name="no_hp" class="form-control" id="No_hp" value="{{ old('no_hp',$user->no_hp) }}" aria-describedby="numberHelp" required>
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password Baru</label>
          <input type="password" name="password" class="form-control" id="passwordvalidation" placeholder="Minimal 6 Karakter">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="Password-Confirmation">
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
</form>
        @endsection


