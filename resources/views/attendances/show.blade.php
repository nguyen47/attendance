@extends('template.layout')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$attendances[0]->students->name}} Attendance Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Attendance Report</li>
            <li class="breadcrumb-item active">{{$attendances[0]->students->name}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th>Total Hours</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($attendances as $attendance)
                <tr>
                  <td>{{$attendance->students->name}}</td>
                  <td>{{$attendance->check_in}}</td>
                  <td>{{$attendance->check_out}}</td>
                  @php

                  $checkIn = \Carbon\Carbon::parse($attendance->check_in);
                  $checkOut = \Carbon\Carbon::parse($attendance->check_out);
                  @endphp
                  @if ($attendance->check_out === null || $attendance->check_in === null)
                  <td>Failed</td>
                  @else
                  <td>{{$checkOut->diffInHours($checkIn)}} hours</td>
                  @endif
                  @if ($checkOut->diffInHours($checkIn) >= 3 && $attendance->check_out && $attendance->check_in)
                  <td><span class="badge bg-success">Passed</span></td>
                  @else
                  <td><span class="badge bg-danger">Failed</span></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $('#example1').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    });
});
</script>
@endsection
@endsection