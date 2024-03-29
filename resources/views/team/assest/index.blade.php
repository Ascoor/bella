@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link
    href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet">
<link
    href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}"
    rel="stylesheet">
<link
    href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}"
    rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
<!---Internal Owl Carousel css-->
<link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}"
    rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}"
    rel="stylesheet">
<!--- Select2 css -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet">
@section('title')
الخدمات المعاونة
@stop

    @endsection
    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمة المساعدين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @endsection

    @section('content')

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة مساعد</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0"> الإسم</th>
                                    <th class="border-bottom-0"> القسم</th>

                                    <th class="border-bottom-0">صورة</th>
                                    <th class="border-bottom-0">رقم الجوال</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                            <tbody>

                                <?php $i = 0; ?>
                                @foreach($assests as $x)
                                    <?php $i++; ?>



                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $x->assest_name }}</td>
                                        <td>{{ $x->section->section_name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/assests/' . $x->photo) }}"
                                                width="50" height="50">

                                        </td>
                                        <td>{{ $x->phone }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-section_id="{{ $x->section->id }}"
                                                data-assest_name="{{ $x->assest_name }}"
                                                data-phone="{{ $x->phone }}" data-gender="{{ $x->gender }}"
<<<<<<< HEAD
=======

>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476
                                                data-toggle="modal" href="#edit_assest" title="تعديل"><i
                                                    class="las la-pen"></i></a>



                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-assest_name="{{ $x->assest_name }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مساعد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('assests.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">الأسم</label>
                            <input type="text" class="form-control" id="assest_name" name="assest_name" required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label">الجنس:</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option selected disabled> --حدد القسم--</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="specialization" class="col-form-label">الصورة الشخصية:</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="title">رقم الجوال:</label>
                            <input class="form-control" type="tell" id="phone" name="phone">
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <!-- edit -->

    <!-- edit -->
    <div class="modal fade" id="edit_assest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل مساعد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="assests/update" method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">الاسم:</label>
                            <input type="hidden" name="id" id="id" value="">
                            <input type="text" class="form-control" id="assest_name" name="assest_name">
                        </div>
                        <div class="form-group">
                            <label for="section_id" class="col-form-label">القسم:</label>
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="">-- اختر القسم --</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-form-label">الجنس:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="specialization" class="col-form-label">الصورة الشخصية:</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">رقم الجوال:</label>
                            <input type="tell" class="form-control" id="phone" name="phone">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف المساعد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="assests/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="assest_name" id="assest_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- main-content closed -->
    @endsection
    @section('js')
    <!-- Internal Data tables -->
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}">
    </script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}">
    </script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


    <script>
        $('#edit_assest').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var assest_name = button.data('assest_name')
            var section_id = button.data('section_id')
            var id = button.data('id')

            var gender = button.data('gender')
<<<<<<< HEAD
=======

>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476
            var phone = button.data('phone')
            var modal = $(this)
            modal.find('.modal-body #assest_name').val(assest_name);
            modal.find('.modal-body #section_id').val(section_id);
<<<<<<< HEAD
=======

>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476

            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #id').val(id);
        })
    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var assest_name = button.data('assest_name')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #assest_name').val(assest_name);
        })
    </script>



    @endsection
