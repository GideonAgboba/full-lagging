@extends('layouts.app')
@include('account.layouts.navbar')
@section('contents')
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<style>
#createbrandform{
    display: none;
}
#closepostform{
    display: none;
}
.brandpostinfo{
    display:none;
}
</style>

<div class="brandpostinfo bg-primary p-3 text-center"><a>Upload atleast one image for every  product and maximum of 3 images can be uploaded</a></div>
<div class="container-fluid">
     <!-- Content Wrapper. Contains page content -->
  <div class="pt-3">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="uploads/{{Auth::user()->path}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->role->title}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Posts</b> <a class="float-right">{{App\Products::where('user_id', Auth::user()->id)->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Brands</b> <a class="float-right">{{App\Vendor::where('user_id', Auth::user()->id)->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Customers</b> <a class="float-right">0</a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Auth::user()->phone == 'not available')
                    <p class="text-center text-danger">
                        Please update profile
                    </p>
                @else
                <strong><i class="fa fa-book mr-1"></i> Bio:</strong>

                <p class="text-muted">
                 {{Auth::user()->bio}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                <p class="text-muted">{{Auth::user()->address}}</p>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#brands" data-toggle="tab">Brands</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    @if(Auth::user()->created_at !== '')
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="uploads/{{Auth::user()->path}}" alt="user image">
                        <span class="username">
                          <a href="#">{{Auth::user()->name}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Noted - {{Auth::user()->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        You created this profile {{Auth::user()->created_at->diffForHumans()}}
                      </p>
                    </div>
                    <!-- /.post -->
                    @endif
                    
                    @if(Auth::user()->created_at !== '')
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="uploads/{{Auth::user()->path}}" alt="user image">
                        <span class="username">
                          <a href="#">{{Auth::user()->name}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Noted - {{Auth::user()->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        You updated this profile {{Auth::user()->updated_at->diffForHumans()}}
                      </p>
                    </div>
                    <!-- /.post -->
                    @endif

                    @if($createdbrands = App\Vendor::where('user_id', Auth::user()->id)->get())
                        @foreach($createdbrands as $createdbrand)
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="uploads/{{Auth::user()->path}}" alt="user image">
                                <span class="username">
                                <a href="#">{{Auth::user()->name}}</a>
                                <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                                </span>
                                <!-- <span class="description">Noted - {{$createdbrand->created_at->diffForHumans()}}</span> -->
                            </div>
                            <!-- /.user-block -->
                            <p>
                                You created a brand called <strong>{{$createdbrand->name}}</strong> {{$createdbrand->created_at->diffForHumans()}}
                            </p>
                        </div>
                        <!-- /.post -->
                        @endforeach
                    @endif



                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="brands">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <button class="p-2 btn text-white" id="brandactivator" style="background: red;">Create a post <i class="fa fa-shopping-cart"></i></button>
                                </div>
                                <div class="col-lg-9">
                                    <form  enctype="multipart/form-data" class="profilemakebrand">
                                    <!-- <form enctype="multipart/form-data" action="{{url('/profilemakebrand')}}" method="POST"> -->
                                        <div class="row">
                                        {{csrf_field()}}
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="text" name="name" placeholder="Brand Name" class="form-control" style="width: 28%;" required />
                                        <input type="text" name="description" placeholder="Brand Description" class="form-control" style="width: 40%;" required />
                                        <!-- <input type="file" name="path"  class="form-control" style="width: 20%;" required />/ -->
                                        <div class="" style="width: 20%;">
                                            <div class="input-group">
                                            <div class="custom-fil">
                                                <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                                <label class="custom-file-label" for="exampleInputFile">Logo</label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <button type="submit" class="btn form-control btn-primary">Create Brand</button>
                                        <button id="loading" disabled class="btn form-control btn-warning text-white">Creating Brand <i class="loader fa fa-plus"></i></button>
                                        <button id="done" class="btn form-control btn-success">Brand Created <i class="fa fa-check"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="brandcontent">
                            @if(App\Vendor::where('user_id', Auth::user()->id)->count() > 0)
                                @if($brands = App\Vendor::where('user_id', Auth::user()->id)->get())
                                    @foreach($brands as $brand)
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="text-center">
                                                    <img class="img-fluid img-circle" style="width: 80px;height: 80px;" src="uploads/{{$brand->path}}" alt="User profile picture">
                                                    <small>
                                                        <small><h3 class="profile-username text-center">{{$brand->name}}</h3></small>
                                                    </small>
                                                    <small>
                                                        <p>{{$brand->description}}</p>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div style="width 90%;overflow-x: auto;">
                                                    <table id="example2" class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>UPDATE</th>
                                                        <th>NAME</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>NEW LOGO</th>
                                                        <th>LOGO</th>
                                                        <th>DELETE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                    <td>
                                                                <form class="adminupdatedailybrands" enctype="multipart/form-data">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                                                                    <input type="hidden" name="oldpath" value="{{$brand->path}}">
                                                                    {{csrf_field()}}
                                                                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-edit"></i></button>
                                                                        <button id="loading"  class="btn btn-warning form-control" disabled>
                                                                            <i class="loader fa fa-plus"></i>
                                                                        </button>
                                                                        <button id="done" class="btn btn-success form-control">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>
                                                                    </td>
                                                                    <td><input type="text" name="name" value="{{$brand->name}}" class="form-control" required /></td>
                                                                    <td><input type="text" name="description" value="{{$brand->description}}" class="form-control" required /></td>
                                                                    <td><input type="file" name="path" class="form-control"></td>
                                                                    <td>
                                                                        <img src="uploads/{{$brand->path}}" width="50" height="50" alt="">
                                                                </form>
                                                                    </td>
                                                                    <td>
                                                                        <form class="admindeletedailybrands">
                                                                            <input type="hidden" name="id" value="{{$brand->id}}">
                                                                            {{csrf_field()}}
                                                                            <button type="submit" class="btn btn-danger form-control form-control"><i class="fa fa-trash"></i></button>
                                                                            <button id="loading"  class="btn btn-warning form-control" disabled>
                                                                                <i class="loader fa fa-plus"></i>
                                                                            </button>
                                                                            <button id="done" class="btn btn-success">
                                                                                <i class="fa fa-check"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                            </tr>
                                                    </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                <p class="text-center text-danger">
                                    No Brand Available
                                </p>
                            @endif
                            <hr>
                        </div>

                        <!-- BRAND FORM -->
                        <div class="card-body" id="createbrandform">
                            <div class="card-header">
                                <div class="row">
                                    <h3 class="col-lg-9">Create Post Form</h3>
                                    <button id="closepostform" style="background: red;" class="btn form-control text-white col-lg-3"><i class="fa fa-arrow-left"></i> Back to Brands</button>
                                </div>
                            </div>
                            <form action="{{url('/userpostcreate')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required />
                                <div class="card-body">
                                    <div class="row"> 
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Post Title" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="description" placeholder="Post Description" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select name="vendor_id" class="form-control" required>
                                                    <option value="">Select Brand</option>
                                                    @if(App\Vendor::where('user_id', Auth::user()->id)->count() > 0)
                                                        @if($userbrands = App\Vendor::where('user_id', Auth::user()->id)->get())
                                                            @foreach($userbrands as $userbrand)
                                                                <option value="{{$userbrand->id}}">{{$userbrand->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        <option value="0">No brand</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Categories</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @if($cats = App\Category::all())
                                                        @foreach($cats as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Min price</label>
                                                <input type="number" name="min_price" class="form-control" placeholder="Min Price" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Max price</label>
                                                <input type="number" class="form-control" name="max_price" placeholder="Min Price" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Percentege Off</label>
                                                <input type="number" name="percentage_off" class="form-control" placeholder="%Off"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Post Image One</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="path1" class="custom-file-input" id="exampleInputFile" required />
                                                    <label class="custom-file-label" for="exampleInputFile">Add Photo1</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Post Image Two</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="path2" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Add Photo2</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Post Image Three</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="path3" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Add Photo3</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn form-control btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- END BRAND FORM -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Edit From</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/profileupdate')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{Auth::user()->id}}" required />
                            <div class="card-body">
                                <div class="row"> 
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                            <label>Name</label>
                                            <input type="text" disabled class="form-control" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{Auth::user()->phone}}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Account Type</label>
                                                    <select name="role_id" class="form-control" required >
                                                        <option value="">Account Type</option>
                                                        <option value="1">Account</option>
                                                        <option value="2">Marchant</option>
                                                        <option value="3">G-Marchant</option>
                                                        <option value="4">Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{Auth::user()->address}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" placeholder="City" value="{{Auth::user()->city}}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{Auth::user()->country}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Bio</label>
                                        <textarea name="bio" class="form-control" placeholder="Write About You" id="" cols="20" rows="4" required > {{Auth::user()->bio}}</textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-lg-3">
                                        <label>Zip</label>
                                        <input type="text" name="zip" class="form-control" palcholde="Zip" value="{{Auth::user()->zip}}" required />
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Display-Picture</label>
                                            <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Click to change photo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Enter password to save changes" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn form-control btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
@endsection