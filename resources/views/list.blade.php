{{-- Show event list --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div>
        <div class="row">
            <div class="col-md-12">
    
                @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
    
                @endif
                <div class="card">
    
                    <div class="card-header">
                        <h3>Comparative Statement
                            <a href="{{ url('cs/create')}}" class="btn btn-primary btn-sm text-white float-end">Add
                                CS</a>
                        </h3>
                    </div>
    
    
                    <div class="card-body">
    
                        <table class="table table-bordered table-striped">
    
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>CS Ref No</th>
                                    <th>Effective Date</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
    
                                </tr>
                            </thead>
    
                            <tbody>
    
                                @foreach ($cses as $cs)
                                <tr>
    
                                    <td>{{$cs->id}}</td>
                                    <td>{{$cs->cs_ref_no}}</td>
                                    <td>{{$cs->effective_date}}</td>
                                    <td>{{$cs->expiry_date}}</td>
    
    
                                    <td>
                                        {{-- <a href="{{url('admin/event/'.$event->id.'/edit')}}"
                                            class="btn btn-primary btn-sm">Edit</a>
     --}}
                                        <a href="{{url('cs/'.$cs->id.'/details')}}"
                                            class="btn btn-info btn-sm">Details</a>
    
                                        <a href="{{url('cs/'.$cs->id.'/delete')}}"
                                            onclick="return confirm('Are you sure to delete this data?')"
                                            class="btn btn-danger btn-sm">Delete</a>
    
                                    </td>
                                </tr>
    
                                @endforeach
    
                            </tbody>
    
                        </table>
    
                        {{-- <div>
                            {{ $cses->links()}}
                        </div>
     --}}
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>
</body>
</html>
