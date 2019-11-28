@extends('template.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"
  integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('js')
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"
  integrity="sha256-d/edyIFneUo3SvmaFnf96hRcVBcyaOy96iMkPez1kaU=" crossorigin="anonymous"></script>
<script>
  $(function () {
    $('.js-example-basic-single').select2();
    //Add text editor
    $('#compose-textarea').summernote();
  });
</script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Compose</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Compose</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Compose New Message</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('mail.sendEmail')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>To: </label>
                  <select class="form-control js-example-basic-single" name="student_id">
                    @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Subject: </label>
                  <input class="form-control" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                  <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
                      </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
            </form>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection