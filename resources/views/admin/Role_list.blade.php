@extends('./layouts/app')

@section('page-content')

@forelse ($roles as $role)
    <p>{{ $role->name }}</p>
@empty
    
@endforelse

@endsection