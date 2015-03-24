<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>
   Snake Farm
  </title>
 </head>
 <body>
  <h3>Production:</h3>
  <ul>
    <li>{!! $production['venom'] !!} ml of Venom</li>
    <li>{!! $production['leather'] !!} Snake Skin</li>
  </ul>
  <h3>Cost:</h3>
  <ul>
    <li>{!! $livestock['mice']!!} mice</li>
  </ul>
  <h3>Stock Food:</h3>
  <ul>
    <li>{!! 100 - $livestock['mice'] !!}</li>
  </ul>
  <h3>Livestock:</h3>
  <ul>
    @foreach ($livestock['snakes'] as $snake)
        <li>{!! $snake['name'] !!} {!! $snake['age'] !!} years old</li>
    @endforeach
  </ul>
 </body>
</html>