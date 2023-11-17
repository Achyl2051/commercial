@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Attribute Role to user</h4>
        <p class="card-description">
          Basic form layout
        </p>
        <form class="forms-sample" action="{{ route('permission.attributeRoleToUser')  }} " method="post">
          @csrf
          @method('post')

          <div class="form-group">
            <label for="user">User</label>
            <select name="idUser" class="form-control" >
                @forelse ($users as $user)
                <p></p>
                <option value="{{ $user->idUser }}">{{ $user->name }}</option>
                @empty

                 @endforelse
            </select>
            @error('idUser')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
        </div>

        
        <div class="form-group">
            <label for="idRoles">Roles</label>
            <div id="idRoles">
                @forelse ($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="idRoles[]" value="{{ $role->id }}">
                    <label class="form-check-label">{{ $role->name }}</label>
                    <div>
                        @forelse ($role->permissions as $permission)
                        <span class="small"> {{ $permission->name }} , </span>
                        @empty
        
                         @endforelse
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            @error('idRoles')
                <div class="text text-danger">{{ $message }}</div>
            @enderror  
        </div>

          <button type="submit" class="btn btn-primary me-2">enregistrer</button>
        </form>
        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif 
      </div>
    </div>
</div>
@endsection
