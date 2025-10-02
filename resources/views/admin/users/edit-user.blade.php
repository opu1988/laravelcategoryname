@extends('admin.master-admin')


@section('content')


        @include('admin.left-sidemenu')


        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if(session()->has('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <h4 class="card-title">Edit User</h4>
                    <hr>
                    <form class="forms-sample" method="POST" action="{{ route('users.update', $user->id) }}">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label for="posttitle">Full Name</label>
                        <input type="text" name="title" class="form-control" id="posttitle" value="{{ $user->name }}" placeholder="Type post title">
                      </div>
                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Type email address">
                      </div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="" placeholder="Type password">
                      </div>

                      <div class="form-group">
                        <label for="email">Re-write Password</label>
                        <input type="password" name="re-password" class="form-control" id="re-password" value="" placeholder="Type password again">
                      </div>
                      
                      <div class="form-group">
                        <label>User Photo</label>
                        <input type="file" name="thumbnail"  class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" value="{{ $user->photo }}"  placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                  
                      <button type="submit" class="btn btn-success mr-2">Edit User</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  

                        
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
@endsection('content')
