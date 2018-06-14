@extends('admin.layouts.app')
@section('contents')
<!-- DataTables -->
<link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap4.css">







<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home control</a></li>
              <li class="breadcrumb-item active">vendors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-lg-8 zoom80">
                    <!-- Main content -->
                    <section class="content" id="dailydealstable">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-table"></i> Vendors table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="width: 97%;overflow-x: auto !important;">
                                <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th>EDIT</th>
                                    <th>VENDOR_NAME</th>
                                    <th>VENDOR_EMAIL</th>
                                    <th>VENDOR_PHONE</th>
                                    <th>VENDOR_DESCRIPTION</th>
                                    <th>VENDOR_ADDRESS</th>
                                    <th>VENDOR_CITY</th>
                                    <th>VENDOR_COUNTRY</th>
                                    <th>VENDOR_ZIP</th>
                                    <th>VENDOR_BIO</th>
                                    <th>IMAGE</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(App\User::where('role_id', 2)->count() > 0)
                                    @if($vendors = App\User::where('role_id', 2)->get())
                                        @foreach($vendors as $vendor)
                                        <tr>
                                                <td>
                                            <form class="admineditvendors" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="{{$vendor->id}}">
                                                {{csrf_field()}}
                                                    <button type="submit" class="btn btn-primary form-control"><i class="fa fa-edit"></i></button>
                                                    <button id="loading"  class="btn btn-warning form-control" disabled>
                                                        <i class="loader fa fa-plus"></i>
                                                    </button>
                                                    <button id="done" class="btn btn-success form-control">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </td>
                                                <td><input type="text" name="name" value="{{$vendor->name}}" class="form-control" required /></td>
                                                <td><input type="text" name="email" value="{{$vendor->email}}" class="form-control" required /></td>
                                                <td><input type="text" name="phone" value="{{$vendor->phone}}" class="form-control" required /></td>
                                                <td><input type="text" name="description" value="{{$vendor->description}}" class="form-control" required /></td>
                                                <td><input type="text" name="address" value="{{$vendor->address}}" class="form-control" required /></td>
                                                <td><input type="text" name="city" value="{{$vendor->city}}" class="form-control" required /></td>
                                                <td><input type="text" name="country" value="{{$vendor->country}}" class="form-control" required /></td>
                                                <td><input type="text" name="zip" value="{{$vendor->zip}}" class="form-control" required /></td>
                                                <td><input type="text" name="bio" value="{{$vendor->bio}}" class="form-control" required /></td>
                                                <td>
                                                    <img src="uploads/{{$vendor->path}}" width="50" height="50" alt="">
                                            </form>
                                                </td>
                                                <td>
                                                    <form class="admindeletevendors">
                                                        <input type="hidden" name="id" value="{{$vendor->id}}">
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
                                        @endforeach
                                    @endif
                                @else
                                    <p class="text-center text-danger">
                                        No Vendor available
                                    </p>
                                @endif
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="text-left text-muted">Securetech @2018</a>
                            </div>
                            <!-- card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                </div>
            <!-- right colum -->
            <div class="col-md-4 zoom80">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header row">
                    <h3 class="card-title col-lg-11">Create vendor</h3>
                    <form action="" class="col-lg-1" id="refresh">
                        <button typw="submit"><i class="fa fa-refresh"></i></button>
                    </form>
                </div>
                <!-- /.card-header -->
                <!-- form start -->





                <form class="admincreatevendors"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <input type="text" name="name" placeholder="Name" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="email" name="email" placeholder="Email" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="password" name="password" placeholder="Password" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">CREATE USER <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning text-white">CREATING USER <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>


                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- DataTables -->
<script src="admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection