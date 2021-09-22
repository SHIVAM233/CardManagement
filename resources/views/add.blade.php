<!DOCTYPE html>
<html lang="en">
<head>
  <title>Card Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                    @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                    @endif
                    @if ($errors->any()) <div class="alert alert-danger"> <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div> @endif
                    {!! Form::open(array('url' =>'add', 'enctype'=>'multipart/form-data', 'method' => 'post', 'class'=>"form-horizontal","novalidate"=>"novalidate", 'data-parsley-validate'=>"","autocomplete"=>"off")) !!}
                        <div class="form-group">
                            <label>Person Name</label>
                            <input type="text" class="form-control" id="person_name" name="person_name" placeholder="Enter Person Name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="tel" class="form-control" id="contact" name="contact" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Enter Contact">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="{{route('welcome')}}">back</a>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
