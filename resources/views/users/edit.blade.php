@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update user</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input value="{{ $user->firstname }}" 
                        type="text" 
                        class="form-control" 
                        name="firstname" 
                        placeholder="first Name" required>

                    @if ($errors->has('firstname'))
                        <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    {{-- <label for="name" class="form-label">Employee Id</label> --}}
                    <input type="hidden" value="1" name="lastname">
                    @if ($errors->has('lastname'))
                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    {{-- <label for="name" class="form-label">Password</label> --}}
                    <input value="bidinls" 
                        type="hidden" 
                        class="form-control" 
                        name="password" 
                        placeholder="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="email">Employee Id</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                
                <div class="mb-3">
                    <label for="division" class="form-label">Division</label>
                    <input value="{{ $user->division }}" 
                        type="text" 
                        class="form-control" 
                        name="division" 
                        placeholder="Division" >

                    @if ($errors->has('division'))
                        <span class="text-danger text-left">{{ $errors->first('division') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="headquarter" class="form-label">Headquarter</label>
                    <input value="{{ $user->headquarter }}" 
                        type="text" 
                        class="form-control" 
                        name="headquarter" 
                        placeholder="Headquarter">

                    @if ($errors->has('headquarter'))
                        <span class="text-danger text-left">{{ $errors->first('headquarter') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="designer" class="form-label">Designation</label>
                    <input value="{{  $user->designer  }}" 
                        type="text" 
                        class="form-control" 
                        name="designer" 
                        placeholder="Designation">

                    @if ($errors->has('designer'))
                        <span class="text-danger text-left">{{ $errors->first('designer') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" 
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole) 
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection