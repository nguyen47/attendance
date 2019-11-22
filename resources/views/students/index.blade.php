@extends('template.layout')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Students</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a href="{{route('students.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> New
                            Student</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('images.index', $student->id)}}" class="btn btn-primary"><i
                                                class="fas fa-image"></i></a>
                                        <a href="{{route('students.edit', $student->id)}}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('students.show',$student->id)}}" type="button" class="btn btn-secondary"><i
                                                class="fas fa-info"></i></a>
                                        <a href="javascript:void(0)" type="button" id="deleteItem"
                                            data-id="{{ $student->id }}" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
    $('#example1').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    });

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
$(document).ready(function(){
    $("#deleteItem").click(function() {
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/students')}}"+'/'+id,
            success: function (data) {
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>
@endsection
@endsection