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
                                        <a href="{{route('students.show',$student->id)}}" type="button"
                                            class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $student->id }}">
                                            <i class="fas fa-trash"></i></button>
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


<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <form action="{{route('students.destroy', 'test')}}" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="student_id" id="student_id" value="">
                    <p>Are you sure? It will delete all the images of this student</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete It</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

    $("#deleteModal").on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('.modal-body #student_id').val(id);
});
</script>
@endsection
@endsection