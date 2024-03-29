@extends('template.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Major Major</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Major Detail</li>
                        <li class="breadcrumb-item active">{{$major->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form role="form" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Major Name</label>
                                    <input type="text" readonly name="name" class="form-control" placeholder="Enter Major Name" value="{{$major->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" readonly name="description" class="form-control" placeholder="Enter Description" value="{{$major->description}}">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{route('majors.edit', $major->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('majors.index')}}" class="btn btn-default">Cancel</a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection 