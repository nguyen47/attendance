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
          <h1>Attendance Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Attendance Report</li>
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
          <div class="card-header">
            <a href="{{route('attendances.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> New
              Attendance</a>
          </div>
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
                  <th>Action</th>
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
                  <td>
                    <a href="{{route('attendances.edit', $attendance->id)}}" type="button" class="btn btn-primary"><i
                        class="fas fa-edit"></i></a>
                    <a href="{{route('attendances.show',$attendance->id)}}" type="button" class="btn btn-secondary"><i
                        class="fas fa-info"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#deleteModal" data-id="{{ $attendance->id }}">
                      <i class="fas fa-trash"></i>
                    </button>

                  </td>
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

<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <form action="{{route('attendances.destroy', 'test')}}" id="deleteForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="hidden" name="attendance_id" id="attendance_id" value="">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete It</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



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


  $("#deleteModal").on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('.modal-body #attendance_id').val(id);
  });
</script>
@endsection
@endsection