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
                        <h2 class="card-title">All Posts</h2>
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
                          <th>Post ID</th>
                          <th>Thumbnail</th>
                          <th> Post Title </th>
                          <th> Post Categories </th>
                          <th> Post Author </th>
                          <th> Updated On </th>
                          <th> <> </th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($posts->all() as $post)
                        <tr>
                          <td>{{ $post->id }}</td>  
                          <td class="py-1">
                            <img class="thumb-image" src="{{ route('home') }}/storage/images/{{ $post->thumbnail }}" alt="image" />
                          </td>
                          <td> {{ $post->title }} </td>
                          <td>{{ $post->category->name }}</td>
                          
                          <td> {{ $post->user->name }} </td>
                          
                          <td> {{ date('F d, Y', strtotime($post->updated_at) ) }} </td>
                          <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                          <td>
                            <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                          </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>

                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
@endsection('content')