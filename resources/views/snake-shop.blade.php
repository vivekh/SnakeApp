<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>
   Snake Farm
  </title>
 </head>
 <body>
  {!! Form::open(array('url'=>'form-submit','files'=>true)) !!}

  <div class="form-group">
  {!! Form::label('file','File',array('id'=>'','class'=>'')) !!}
  {!! Form::file('file','',array('id'=>'','class'=>'')) !!}
  </div>
  <br/>
  <div class="form-group">
  {!! Form::label('days', 'Days'); !!}
  {!! Form::text('days') !!}
  </div>
  <br/>
  <div class="form-group">
  <!-- submit buttons -->
  {!! Form::submit('Upload') !!}
  </div>

  {!! Form::close() !!}
 </body>
</html>