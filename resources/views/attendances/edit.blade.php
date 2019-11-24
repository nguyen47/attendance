@extends('template.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"
  integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Attendance</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Edit Attendance</li>
            <li class="breadcrumb-item active">{{$attendance->id}}</li>
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
            <form role="form" action="{{route('attendances.update', $attendance->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Student Name</label>
                  <select class="form-control js-example-basic-single" name="student_id">
                    @foreach ($students as $student)
                    <option @if ($attendance->student_id === $student->id) selected @endif
                      value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Check In And Check Out</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime" name="checkTime">
                    <input type="hidden" id="start_date" name="start_date" value="{{$attendance->check_in}}">
                    <input type="hidden" id="end_date" name="end_date" value="{{$attendance->check_out}}">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('attendances.index')}}" class="btn btn-default">Cancel</a>
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"
  integrity="sha256-d/edyIFneUo3SvmaFnf96hRcVBcyaOy96iMkPez1kaU=" crossorigin="anonymous"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
    //Date range picker with time picker
    const start_date = $("#start_date").val();
    const end_date = $("#end_date").val(); 
    $('#reservationtime').daterangepicker({
      timePicker: true,
      "startDate": start_date,
      "endDate": end_date,
      "timePickerSeconds": true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD H:mm:ss'
      }
    })
});
</script>
@endsection