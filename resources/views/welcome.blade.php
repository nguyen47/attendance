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
</head>

<body>
  <div class="container">
    <div id="my_camera" style="width:640px; height:480px;"></div>
    <a href="javascript:void(take_snapshot())">Take Snapshot</a>
  </div>

  <script>
    Webcam.attach('#my_camera');
    async function take_snapshot() {
      Webcam.snap(async function(data_uri) {
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
            console.log(bestMatch);
          }
      });
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