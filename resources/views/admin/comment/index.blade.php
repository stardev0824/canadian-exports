@extends("admin.layouts.app")

@push("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet">

@endpush

@section("title","Testimonial Management")

@section("content")



    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All comments
                    </h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>

                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($comments as $key=>$comment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->email}}</td>

                                    <td>{{$comment->created_at}}</td>
                                    <td>{{$comment->updated_at}}</td>
                                    <td class="text-center ">


                                            <button type="button"  data-toggle="modal" data-target="#{{$key}}" class=" btn bg-blue waves-effect">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>

                                        <button class="btn btn-danger waves-effect"  type="button" onclick="deleteTag({{$comment->id}})">
                                            <i class="material-icons ">delete</i>
                                        </button>

                                        <form action="{{route("admin.comment.destroy",$comment->id)}} "
                                              method="post" style="display: none"
                                              id="delete-form-{{$comment->id}}">
                                            @csrf
                                            @method("delete")
                                        </form>
                                    </td>
                                </tr>


                                <!-- Default Size -->
                                <div class="modal fade" id="{{$key}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Name : {{ $comment->name}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h3>
                                                    Email : {{$comment->email}}
                                                </h3>

                                                <p>
                                                    {{$comment->comment}}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- For Material Design Colors -->
    <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="body table-responsive">
                        <table class="table">

                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>FIRST NAME</td>
                            </tr>
                            <tr>
                                <th>place</th>
                                <td>Place</td>
                            </tr>
                            <tr>
                                <th>category</th>
                                <td>Category NAME</td>
                            </tr>
                            <tr>
                                <th>comment</th>
                                <td>Comment</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@push("js")
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/jquery.dataTables.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.flash.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/jszip.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/pdfmake.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/vfs_fonts.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.html5.min.js")}}"></script>
    <script src="{{asset("assets/back_end/plugins/jquery-datatable/extensions/export/buttons.print.min.js")}}"></script>

    <script src="{{asset('assets/back_end/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        const deleteTag=id=>{
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById("delete-form-"+id).submit();
                }
            })
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.js-exportable').DataTable({
                dom: 'Blfrtip',
                responsive: true,
                pageLength: 25,
                order: [ 1, 'asc' ],
                lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script src="{{asset("assets/back_end/js/pages/ui/modals.js")}}"></script>

@endpush
