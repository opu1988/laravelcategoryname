@extends('admin.master-admin')


@section('content')

        @include('admin.left-sidemenu')


        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if(session()->get('message'))
                      <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="row">
                      <div class="col">
                        <h2 class="card-title">All Users</h2>
                      </div>
                      <div class="col">
                          <form class="ml-auto search-form d-none d-md-block" method="GET" action="{{ route('posts.index') }}">
                            <div class="form-group">
                              <input type="search" name="search" value="{{ $keyword }}" class="form-control" placeholder="Search from posts">
                            </div>
                          </form>
                      </div>
                    </div>
                    

                    
                              
                    <table class="table table-striped mb-3">
                      <thead>
                        <tr>
                          <th>User id</th>
                          <th>Thumbnail</th>
                          <th> Name </th> 
                          <th> User Name </th>
                          <th> Email </th>
                          <th> <> </th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($users->all() as $user)
                        <tr>
                          <td>{{ $user->id }}</td> 
                          <td class="py-1">
                            <img class="thumb-image" src="{{ route('home') }}/storage/images/{{ $user->photo }}" alt="image" />
                          </td>
                          <td> {{ $user->name }} </td>
                          <td>{{ $user->username }}</td>
                          
                          <td> {{ $user->email }} </td>
                          
                          <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a></td>
                          <td>
                            <form method="post" action="{{ route('users.destroy', $user->id) }}">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                          </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>

                    {{ $users->links('vendor.pagination.bootstrap-5') }}
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
@endsection('content')


