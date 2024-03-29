@extends('template.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{asset('assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script type="text/javascript">
  Dropzone.options.dropzone =
   {
      maxFilesize: 12,
      renameFile: function(file) {
          var dt = new Date();
          var time = dt.getTime();
         return time+file.name;
      },
      acceptedFiles: ".jpeg,.jpg,.png",
      addRemoveLinks: true,
      timeout: 5000,
      removedfile: function(file) 
        {
          var name = file.upload.filename;
          $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') 
              },
              type: 'POST',
              url: '{{ route('images.fileDestroy') }}',
              data: {filename: name},
              success: function (data){
                  console.log("File has been successfully removed!!", data);
              },
              error: function(e) {
                  console.log(e);
              }});
              var fileRef;
              return (fileRef = file.previewElement) != null ? 
              fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
      success: function(file, response) 
      {
          console.log(response);
      },
      error: function(file, response)
      {
         return false;
      }
};
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
          <h1>{{$student->name}} Image</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{$student->name}} Image</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{$student->name}}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <form method="post" action="{{route('images.fileStore')}}" enctype="multipart/form-data" class="dropzone"
          id="dropzone">
          <input type="hidden" name="studentId" value="{{$id}}" />
          @csrf
        </form>
      </div>
      <!-- /.card-body -->

      <div class="card-body">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">
                This student have {{count($student->images)}} images
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                @foreach ($images as $image)
                <div class="col-sm-2">
                  <a href="{{url("uploads/$id/$image->url")}}" data-toggle="lightbox" data-title="sample 1 - white"
                    data-gallery="gallery">
                    <img src="{{url("uploads/$id/$image->url")}}" class="img-fluid mb-2" alt="white sample" />
                  </a>
                  <a href="{{route('images.removeImage', $image->id)}}" class="btn btn-danger"
                    style="margin: 0 auto">Remove</a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection