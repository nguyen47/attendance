<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <script src="{{asset('assets/face-api.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!-- Toastr -->
  <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
  <title>Final Project</title>
  <style>

  </style>
</head>

<body>
  {{-- <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header> --}}
  <main role="main" style="margin-top: 0.5em">
    <section class="text-center">
      <div class="container">
        <h1>Informatics Academy New Checking Attendance System</h1>
        <div class="row justify-content-center align-items-center">
          <div class="col-12">
            <div class="justify-content-center" style="margin:auto" id="my_camera"></div>
            <a class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px" id="takeSnap"
              href="javascript:void(take_snapshot())"><i class="fa fa-camera fa-5x" aria-hidden="true"></i>            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Checking Today</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 200px;">
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    Webcam.set({
        width: 1080,
        height: 520,
        dest_width: 1280,
        dest_height: 720,
        image_format: 'jpeg',
        jpeg_quality: 90,
        force_flash: false
    });
    Webcam.attach('#my_camera');
    async function take_snapshot() {
      Webcam.snap(async function(data_uri) {
        $("#takeSnap").attr("disabled", true);
        Webcam.freeze();
        const input = $('<img id="myImg" src="'+data_uri+'" />');
        const results = await faceapi
          .detectAllFaces(input[0], new faceapi.SsdMobilenetv1Options())
          .withFaceLandmarks()
          .withFaceDescriptors();
          const labeledFaceDescriptors = await detectAllLabeledFaces();
          const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.5); // 0.5
          if (!results.length) {
            toastr.error('Face Detect Failed. Please Try Again', 'Error!');
            Webcam.unfreeze();
          }
          for (let i = 0; i < results.length; i++) {
            const bestMatch = faceMatcher.findBestMatch(results[i].descriptor);
            if (bestMatch._label === 'unknown') {
              toastr.error('Face Not Found. Please Contact To Our Staff', 'Error!');
              Webcam.unfreeze();
              return;
            }
            const notification = await checkAttendance(bestMatch);
            if (notification == 'update') {
              toastr.info('Check Out Sucessful.', 'Sucessful', {timeOut: 5000})
            } 
            if (notification == 'new') {
              toastr.success('Check In Sucessful.', 'Sucessful', {timeOut: 5000})
            }
            
            const table = $('.data-table').DataTable();
            table.ajax.reload();
          }
          Webcam.unfreeze();
          $("#takeSnap").attr("disabled", false);
      });
    }

    async function checkAttendance(id) {
      const student_id = id._label;
      const checking = await fetch(`http://127.0.0.1:8000/checkAttendance/${student_id}`);
      const result = await checking.text();
      return result;
    }

    async function detectAllLabeledFaces() {
      const loadImages = await fetch("{{route('getFolderName')}}");
      const labelsUnFormated = await loadImages.text();
      const labels = JSON.parse(labelsUnFormated);
      return Promise.all(
        labels.map(async label => {
          const descriptions = [];
          const url = `http://127.0.0.1:8000/getFileName/${label}`;
            const imageArray = await fetch(url);
            const responseImageArray = await imageArray.text();
            const converImageArray = JSON.parse(responseImageArray);
            for (let i = 0; i < converImageArray.length; i++) {
              const img = await faceapi.fetchImage(
                `http://127.0.0.1:8000/uploads/${label}/${converImageArray[i]}`
              );
              const detection = await faceapi
                .detectSingleFace(img)
                .withFaceLandmarks()
                .withFaceDescriptor();
              descriptions.push(detection.descriptor);
            }
            return new faceapi.LabeledFaceDescriptors(label, descriptions);
        })
      );
    }
    
    (async() => {
      await faceapi.nets.ssdMobilenetv1.loadFromUri("{{asset('assets/models')}}");
      await faceapi.nets.faceRecognitionNet.loadFromUri("{{asset('assets/models')}}");
      await faceapi.nets.faceLandmark68Net.loadFromUri("{{asset('assets/models')}}");
      console.log('Ready!!');
      const table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        ajax: "{{ route('frontPage.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'student_id', name: 'student_id'},
            {data: 'student_name', name: 'student_name'},
            {data: 'check_in', name: 'check_in'},
            {data: 'check_out', name: 'check_out'},
        ]
    });
    })();
		
  </script>

  <script>
    
  </script>
</body>

</html>