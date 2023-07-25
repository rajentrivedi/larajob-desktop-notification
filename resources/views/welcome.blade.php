<!DOCTYPE html>
<html>
<head>
  <title>Desktop Notifier App</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  {{-- <script src="{{resource_path('app.js')}}"></script> --}}
  @vite('resources/js/app.js')
</head>
<body>
  <div class="container">
    <h1 class="text-center">Desktop Notifier App</h1>
    <input type="text" class="form-control m-2" placeholder="Notificaion Title" name="" id="title">
    <textarea name="" class="form-control m-2" id="body" placeholder="Notification Body" cols="30" rows="10"></textarea>

    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="notification_type" id="flexRadioDefault1" value="desktop">
            <label class="form-check-label" for="flexRadioDefault1">
              Desktop
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="notification_type" id="flexRadioDefault2" value="web" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Web
            </label>
          </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary btn-sm" onclick="notify()" id="show-notification">Notify</button>
    </div>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        Echo.channel('notification').listen('NewNotificationEvent', (e)=>{
        console.log(e);
        new Notification(e.data.title,{
            body: e.data.body
        })
      });
    });
    let notificationType;
    function notify() {
        let eles = document.getElementsByName('notification_type');
        for (i = 0; i < eles.length; i++) {
                if (eles[i].checked)
                   notificationType = eles[i].value;
            }
        let body = document.getElementById('body').value;
        let title = document.getElementById('title').value;
        let data = {
            title: title,
            body: body
        };
        // Creating Our XMLHttpRequest object
        let xhr = new XMLHttpRequest();
        let queryString = new URLSearchParams(data).toString();
        // Making our connection

        let url;
        if (notificationType == 'web')
        {
            url = '{{config('app.url')}}' + "/web-notification?" + queryString;
        } else {
            url = '{{route('notification')}}' + "?" + queryString;
        }
        console.log(url);
        xhr.open("GET", url, true);

        // function execute after request is successful
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        }
        // Sending our request
        xhr.send();
        }

  </script>
</body>
</html>
