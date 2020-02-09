@extends('layouts.app')

@section('content')
  <table class="table w-full">
    <tr>
      <th class="w-16">No</th>
      <th>Name</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $role->name }}</td>
      <td>
        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>

        @can('role-edit')
            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
        @endcan

        @can('role-delete')
          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        @endcan
      </td>
    </tr>
    @endforeach
  </table>
@endsection;