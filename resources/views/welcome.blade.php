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
    <div class="row" style="margin-top:20px">
        <div class="col-md-12">
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
        <a class="btn btn-info float-right" href="{{route ('add') }}"  style="margin-bottom:20px">Add</a>
         <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Person Name</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>@php $count = 1;@endphp 
                @foreach($card as $data)
                <tr>
                <td>{{$count++}}</td>
                <td>{{$data->person_name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->contact}}</td>
                <td>{{$data->address}}</td>
                <td>
                    <a href="{{route ('edit', $data->id)}}">Edit</a>/
                    <a href="{{route ('delete', $data->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

</body>
</html>
