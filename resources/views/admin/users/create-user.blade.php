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

                    @if($errors->any() )

                      <div class="alert alert-danger">

                          <ul>
                            @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>

                            @endforeach
                          </ul>
                      </div>
                      
                    @endif
                    <h4 class="card-title">Create User</h4>
                    <hr>
                    <form class="forms-sample" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                      @csrf
                
                      <div class="form-group">
                        <label for="posttitle">Full Name</label>
                        <input type="text" name="name" class="form-control" id="posttitle" value="{{ old('name') }}" placeholder="Type Full Name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Type email address">
                      </div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="" placeholder="Type password">
                      </div>

                      <div class="form-group">
                        <label for="email">Re-write Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="re-password" value="" placeholder="Type password again">
                      </div>
                      
                      <div class="form-group">
                        <label>User Photo</label>
                        <br>
                        <input type="file" name="photo"  >
                        
                      </div>
                  
                      
                      <button type="submit" class="btn btn-success mr-2">Create User</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  
                   
                        
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          
@endsection('content')