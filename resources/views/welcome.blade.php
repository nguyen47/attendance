<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="{{asset('assets/face-api.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <title>Final Project</title>
  <style>

  </style>
</head>

<body>
  <main role="main">
      <section class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="justify-content-center" id="my_camera"></div>
              <a class="btn btn-primary" id="takeSnap" href="javascript:void(take_snapshot())">Take Snapshot</a>
            </div>
          </div>
        </div>
      </section>
  </main>

  <script>
    Webcam.set({
        width: 620,
        height: 480,
        dest_width: 640,
        dest_height: 480,
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
          const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.7);
          if (!results.length) {
            console.log('Face Not Found');
          }
          for (let i = 0; i < results.length; i++) {
            const bestMatch = faceMatcher.findBestMatch(results[i].descriptor);
            await checkAttendance(bestMatch);
          }
          Webcam.unfreeze();
          $("#takeSnap").attr("disabled", false);
      });
    }

    async function checkAttendance(id) {
      const student_id = id._label;
      const checking = await fetch(`http://127.0.0.1:8000/checkAttendance/${student_id}`);
      const result = await checking.text();
      console.log(result);
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
    })();
		
  </script>
</body>

</html>