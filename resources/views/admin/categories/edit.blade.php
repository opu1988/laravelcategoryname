@extends('admin.master-admin')


@section('content')

        @include('admin.left-sidemenu')


        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     @if(session()->get('message'))
                      <div class="alert alert-success">{{ session('message') }}</div>
                     @endif
                    <div class="row">
                      <div class="col">
                        <h2 class="card-title">{{ $title }}</h2>
                      </div>
                      
                    </div>

                    <div class="category-form">
                      <form action="{{ route('categories.update', $current_category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <label for="category_name">Category Name</label>
                        <input class="form-control mb-2" id="category_name" type="text" name="category_name" value="{{ $current_category->name }}" placeholder="category Name">

                        <label for="category_slug">Category Slug</label>
                        <input class="form-control mb-2" id="category_slug" type="text" name="category_slug" value="{{ $current_category->slug }}" placeholder="category Slug">
                        <button type="submit" class="btn btn-primary">
                          Update Category
                        </button>
                      </form>
                    </div>

                    
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
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
                          <th> ID</th>
                          <th> Category Name </th>
                         
                          <th> <> </th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($categories->all() as $category)
                        <tr>
                          <td>{{ $category->id }}</td>  
                          <td> {{ $category->name }} </td>
                          <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a></td>
                          <td>
                            <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                              @csrf
                              @method('delete')


                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                              Delete
                            </button>


                           <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Remove Category: {{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to remove this? 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button> 
                                  </div>
                                </div>
                              </div>
                            </div>


                              
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