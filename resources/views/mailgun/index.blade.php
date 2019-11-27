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
                        <h1><u>Heading Of Message</u></h1>
                        <h4>Subheading</h4>
                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                          was born and I will give you a complete account of the system, and expound the actual teachings
                          of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                          dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                          how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                          is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                          but because occasionally circumstances occur in which toil and pain can procure him some great
                          pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                          except to obtain some advantage from it? But who has any right to find fault with a man who
                          chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                          produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                          dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                          blinded by desire, that they cannot foresee</p>
                        <ul>
                          <li>List item one</li>
                          <li>List item two</li>
                          <li>List item three</li>
                          <li>List item four</li>
                        </ul>
                        <p>Thank you,</p>
                        <p>John Doe</p>
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