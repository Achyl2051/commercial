@extends('./layouts/app')

@section('page-content')
<div class="col-md-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
          <h4 class="card-title">give Permission To a Role</h4>
          <p class="card-description">
            Basic form layout
          </p>
          <form class="forms-sample" action="{{ route('permission.givePermissionToRole')  }} " method="post">
            @csrf
            @method('post')
  
            <div class="form-group mine">

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="idRole" class="form-control" >
                        @forelse ($roles as $role)
                        <p></p>
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @empty
        
                         @endforelse
                    </select>
                    @error('idRole')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="idPermissions">Permission</label>
                    <div id="idPermissions">
                        @forelse ($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" name="idPermissions[]" value="{{ $permission->id }}">
                            <label class="form-check-label">{{ $permission->name }}</label>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    @error('idPermissions')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror  
                </div>


            </div>
  
            <button type="submit" class="btn btn-primary me-2">enregistrer</button>
          </form>
          @if (session()->has('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
          @endif 
        </div>
      </div>
    </div>
</div>

@endsection
