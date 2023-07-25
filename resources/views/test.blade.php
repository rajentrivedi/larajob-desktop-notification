<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
    <title>Document</title>
</head>
<body>

</body>
<script>
   $(document).ready(function(){
      Echo.channel('notification').listen('NewNotificationEvent', (e)=>{
        console.log(e);
        new Notification(e.data.title,{
            body: e.data.body
        })
      })
   })
</script>
</html>
