@extends('template.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>New Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">New Student</li>
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
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <!-- general form elements -->
          <div class="card card-primary">
            <!-- form start -->
            <form role="form" action="{{route('students.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter full name">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label>Fin Number</label>
                  <input type="text" name="fin" class="form-control" placeholder="Enter FIN nuber">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label>Password Confirmation</label>
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password confirmation">
                </div>
                <div class="form-group">
                  <label>Major</label>
                  <select class="custom-select" name="major_id">
                    @foreach ($majors as $major)
                    <option value="{{$major->id}}">{{$major->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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