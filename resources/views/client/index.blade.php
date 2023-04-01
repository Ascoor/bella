@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet">
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
@section('title')
العملاء
@stop

    @endsection
    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمة العملاء</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @endsection
    @section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
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

    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo8">اضافة عميل</a>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم العميل</th>
                                    <th class="border-bottom-0">العنوان</th>
                                    <th class="border-bottom-0">رقم الجوال</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($clients as $x)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                        <a href="{{ url('clients/history', ['client_id' => $x->id]) }}">{{ $x->client_name }}</a>



</td>

                                        <td>{{ $x->address }}</td>
                                        <td>{{ $x->client_phone }}</td>


                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-client_name="{{ $x->client_name }}"
                                                data-birthdate="{{ $x->birthdate }}"
                                                data-address="{{ $x->address }}"
                                                data-client_phone="{{ $x->client_phone }}"
                                                data-email="{{ $x->email }}" data-note="{{ $x->note }}"
                                                data-pid="{{ $x->pid }}" data-gender="{{ $x->gender }}"
                                                data-toggle="modal" href="#editModel" title="تعديل">
                                                <i class="las la-pen"></i>
                                            </a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-client_name="{{ $x->client_name }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                <i class="las la-trash"></i>
                                            </a>
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


        <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $x->id }}"
    aria-hidden="true">       <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel">عرض بيانات العميل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="client_name">اسم العميل</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="text" class="form-control" id="email" name="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">المدينة</label>
                            <input type="text" class="form-control" id="city" name="city" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <input type="text" class="form-control" id="address" name="address" disabled>
                        </div>
                        <div class="form-group">
                            <label for="client_phone">رقم الجوال</label>
                            <input type="tel" class="form-control" id="client_phone" name="client_phone" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pid">رقم الهوية / الإقامة</label>
                            <input type="text" class="form-control" id="pid" name="pid" readonly>
                        </div>
                        <div class="form-group">
                                    <label for="gender">الجنس</label>
                                    <select class="form-control" id="gender" name="gender" readonly>
                                        <option value="male">ذكر</option>
                                        <option value="female">أنثى</option>
                                    </select>
                                </div>
                        <div class="form-group">
                            <label for="client_phone">السن</label>
                            <input type="number" class="form-control" id="age" disabled>
                        </div>
                        <div class="form-group">
                            <label for="note">ملاحظات</label>
                            <textarea class="form-control" id="note" name="note" rows="3" disabled></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة عميل</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('clients.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="client_name">اسم العميل</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>

                            <div class="form-group">
                                <label for="client_phone">رقم الجوال</label>
                                <input type="tel" class="form-control" id="client_phone" name="client_phone" required>
                            </div>

                            <div class="form-group">
                                <label for="pid">رقم الهوية / الإقامة</label>
                                <input type="text" class="form-control" id="pid" name="pid">
                            </div>

                            <div class="form-group">
                                <label for="gender">الجنس</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثى</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birthdate">تاريخ الميلاد</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>

                            <div class="form-group">
                                <label for="note">ملاحظات</label>
                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- End Basic modal -->


        <!-- edit -->
        <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل ييانات العميل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-body">
                            <form action="/clients/update" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">

                                    <label for="exampleInputEmail1">اسم العميل</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">البريد الإلكتروني</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">العنوان</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">العنوان</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">رقم الجوال</label>
                                    <input type="text" class="form-control" id="client_phone" name="client_phone"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="pid">رقم الهوية / الإقامة</label>
                                    <input type="number" class="form-control" id="pid" name="pid">
                                </div>

                                <div class="form-group">
                                    <label for="gender">الجنس</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="male">ذكر</option>
                                        <option value="female">أنثى</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="birthdate">تاريخ الميلاد</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">ملاحظات</label>
                                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">تاكيد</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف العميل</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="clients/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="client_name" id="client_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    <!-- row closed -->



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
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
  $(document).ready(function() {
    $(document).on('click', '.modal-effect', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var client_name = $(this).data('client_name');
      var birthdate = $(this).data('birthdate');
      var address = $(this).data('address');
      var birthdate = $(this).data('birthdate');
      var city = $(this).data('city');
      var client_phone = $(this).data('client_phone');
      var email = $(this).data('email');
      var note = $(this).data('note');
      var pid = $(this).data('pid');
      var gender = $(this).data('gender');
      var age = moment().diff(moment(birthdate, 'YYYY-MM-DD'), 'years');

      $('#showModalLabel').text('عرض بيانات العميل: ' + client_name);
      $('#client_name').val(client_name);
      $('#birthdate').val(birthdate);
      $('#address').val(address);
      $('#city').val(city);
      $('#client_phone').val(client_phone);
      $('#email').val(email);
      $('#note').val(note);
      $('#pid').val(pid);
      $('#gender').val(gender);
      $('#age').val(age);

      $('#showModal').modal('show');
    });
  });
</script>


    <script>
        $('#editModel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var client_name = button.data('client_name');
            var client_phone = button.data('client_phone');
            var address = button.data('address');
            var city = button.data('city');
            var note = button.data('note');
            var email = button.data('email');
            var gender = button.data('gender');
            var birthdate = button.data('birthdate');
            var pid = button.data('pid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #client_name').val(client_name);
            modal.find('.modal-body #note').val(note);
            modal.find('.modal-body #client_phone').val(client_phone);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #city').val(city);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #birthdate').val(birthdate);
            modal.find('.modal-body #pid').val(pid);
        });

        $('#editModel').on('hidden.bs.modal', function () {
            $(this).find('#edit-form').trigger('reset');
        });
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var client_name = button.data('client_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #client_name').val(client_name);
        })
    </script>
    @endsection
