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
                        <h2 class="card-title">All Categories</h2>
                      </div>
                      <div class="col">
                          <form class="ml-auto search-form d-none d-md-block" method="GET" action="{{ route('posts.index') }}">
                            <div class="form-group">
                              <input type="search" name="search" value="{{ $keyword }}" class="form-control" placeholder="Search from categories">
                            </div>
                          </form>
                      </div>
                    </div>
                    

                    
                              
                    <table class="table table-striped mb-3">
                      <thead>
                        <tr>
                          <th>Post ID</th>
                          <th> Category Name </th>
                          <th> Category Slug </th>
                          <th> Updated On </th>
                          <th> <> </th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($categories->all() as $category)
                        <tr>
                          <td>{{ $category->id }}</td>  
                          <td> {{ $category->name }} </td>
                          <td> {{ $category->slug }} </td>
                          
                          <td> {{ date('F d, Y', strtotime($category->updated_at) ) }} </td>
                          <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a></td>
                          <td>
                            <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                          </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>

                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
@endsection('content')