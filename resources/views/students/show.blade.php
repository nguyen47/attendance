@extends('template.layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Student Detail</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student Detail</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

    <!-- START TYPOGRAPHY -->

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Description
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <dl>
                <dt>Description lists</dt>
                <dd>A description list is perfect for defining terms.</dd>
            </dl>
            <dl>
                <dt>Description lists</dt>
                <dd>A description list is perfect for defining terms.</dd>
                </dl>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- ./col -->
        <!-- /.card -->
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- END TYPOGRAPHY -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection