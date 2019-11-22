@extends('template.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Student Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Student Detail</li>
            <li class="breadcrumb-item active">{{$student->name}}</li>
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
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <!-- form start -->
            <form role="form" action="" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Student ID</label>
                  <input readonly type="text" name="name" class="form-control" placeholder="Enter email"
                    value="{{$student->id}}">
                </div>
                <div class="form-group">
                  <label>Full Name</label>
                  <input readonly type="text" name="name" class="form-control" placeholder="Enter email"
                    value="{{$student->name}}">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input readonly type="email" name="email" class="form-control" placeholder="Enter email"
                    value="{{$student->email}}">
                </div>
                <div class="form-group">
                  <label>Fin Number</label>
                  <input readonly type="text" name="fin" class="form-control" placeholder="Enter email"
                    value="{{$student->fin}}">
                </div>
                <div class="form-group">
                  <label>Major</label>
                  <input readonly type="text" name="fin" class="form-control" placeholder="Enter email"
                    value="{{$student->majors->name}}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('students.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('students.index')}}" class="btn btn-default">Cancel</a>
                </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection