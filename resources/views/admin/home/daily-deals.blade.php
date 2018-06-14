@extends('admin.layouts.app')
@section('contents')
<!-- DataTables -->
<link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap4.css">







<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Deals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home control</a></li>
              <li class="breadcrumb-item active">daily deals</li>
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
                                <h3 class="card-title"><i class="fa fa-table"></i> Daily deals table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="width: 97%;overflow-x: auto !important;">
                                <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th>UPDATE</th>
                                    <th>ITEM_TITLE</th>
                                    <th>CATEGORY</th>
                                    <th>MIN_PRICE</th>
                                    <th>MAX_PRICE</th>
                                    <th>AVAILABLE</th>
                                    <th>SOLDOUT</th>
                                    <th>PHOTO</th>
                                    <th>IMAGE</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(App\DailyDeals::all()->count() > 0)
                                    @if($deals = App\DailyDeals::all())
                                        @foreach($deals as $deal)
                                        <tr>
                                                <td>
                                            <form class="adminupdatedailydeals" enctype="multipart/form-data">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                                                <input type="hidden" name="id" value="{{$deal->id}}">
                                                <input type="hidden" name="oldpath" value="{{$deal->path}}">
                                                {{csrf_field()}}
                                                    <button type="submit" class="btn btn-primary form-control"><i class="fa fa-edit"></i></button>
                                                    <button id="loading"  class="btn btn-warning form-control" disabled>
                                                        <i class="loader fa fa-plus"></i>
                                                    </button>
                                                    <button id="done" class="btn btn-success form-control">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </td>
                                                <td><input type="text" name="title" value="{{$deal->title}}" class="form-control" required /></td>
                                                <td><input type="text" name="category" value="{{$deal->category}}" class="form-control" required /></td>
                                                <td><input type="number" name="min_price" value="{{$deal->min_price}}" class="form-control" required /></td>
                                                <td><input type="number" name="max_price" value="{{$deal->max_price}}" class="form-control" required /></td>
                                                <td><input type="number" name="available" value="{{$deal->available}}" class="form-control" required /></td>
                                                <td><input type="number" name="soldout" value="{{$deal->soldout}}" class="form-control" required /></td>
                                                <td><input type="file" name="path" class="form-control"></td>
                                                <td>
                                                    <img src="uploads/{{$deal->path}}" width="50" height="50" alt="">
                                            </form>
                                                </td>
                                                <td>
                                                    <form class="admindeletedailydeals">
                                                        <input type="hidden" name="id" value="{{$deal->id}}">
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
                                        No deal available
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
                    <h3 class="card-title col-lg-11">Create item</h3>
                    <form action="" class="col-lg-1" id="refresh">
                        <button typw="submit"><i class="fa fa-refresh"></i></button>
                    </form>
                </div>
                <!-- /.card-header -->
                <!-- form start -->





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning">POSTING DEAL <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning">POSTING DEAL <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning">POSTING DEAL <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning">POSTING DEAL <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning">POSTING DEAL <i class="loader fa fa-plus"></i></button>
                        <button id="done" disabled class="btn form-control btn-success">DONE  <i class="fa fa-check fa-fw"></i></button>
                        </div>
                        <!-- /.card-body -->
                </form>





                <form class="createdailydeal"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="path" class="custom-file-input" id="exampleInputFile" required />
                                    <label class="custom-file-label" for="exampleInputFile">Item image</label>
                                </div>
                                </div>
                            </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="text" name="category" class="form-control"  placeholder="Category" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input type="number" name="min_price" placeholder="Min price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="max_price" placeholder="Max price" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="available" placeholder="Available" class="form-control" required />
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="number" name="soldout" placeholder="Soldout" class="form-control" required />
                                </div>
                            </div>

                        <button type="submit" class="btn form-control btn-primary">POST DEAL <i class="fa fa-send fa-fw"></i></button>
                        <button id="loading" disabled class="btn form-control btn-warning text-white">POSTING DEAL <i class="loader fa fa-plus"></i></button>
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