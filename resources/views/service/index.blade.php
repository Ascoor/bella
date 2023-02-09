@extends('home')
@section('content')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

<div class="card-body">
    <h4 class="card-header text-center text-light">Services List</h4>


    @if($message = Session::get('Done'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif
    @if(session('status'))
    <div class="alert alert-danger" role="alert">
        {{ session('status') }}
        @endif


        <div class="card-body">
            <div class="col-sm-6 col-12 text-sm-end">
                <div class="mx-n1">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-3">
                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                    href="#modaldemo8">إضافة خدمة جديد</a>
            </div> @if($services->count() > 0 )
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Cost</th>
                                    <th class="border-bottom-0">Doctor</th>
                                    <th class="border-bottom-0">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->cost }}</td>

                                    <td>{{ $item->doctor_name }}</td>
                                    <td>
                                        <span>


                                            <a class="btn btn-primary"
                                                href="{{route('services.edit',$item->id)}}">Edit</a>

                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>









        @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
                No Services
            </div>
        </div>
    </div>
    @endif



    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">إضافة خدمة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">

                            <p class="h-blue">{{__('Doctor')}}</p>
                            <select class="border-0 outline-none" name="doctor_name">
                                @foreach ($doctors as $item )

                                <option value="{{ $item->name }}">
                                    {{$item->name}}</option>

                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="number" class="form-control" name="cost">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">إضافة الخدمة</button>
                    </form>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">غلق</button>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
