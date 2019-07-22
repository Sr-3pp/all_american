<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nuevo documento en el servidor</title>
</head>
<body>
  <h2>Hello</h2>
  <p>Someone has sent a message:</p>
  <p>
    {{$contact->name}}
  </p>
  <p>
    {{$contact->email}}
  </p>
  <p>
    {{$contact->afair}}
  <p>
    {{$contact->message}}
  </p>
</body>
</html>
