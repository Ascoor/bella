@extends('layouts.app')
@section('css')
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
@if(session()->has('complete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('complete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('rejected'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('rejected') }}</strong>
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

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">إسم العميل</th>
                                <th class="border-bottom-0">تاريخ و موعد الحجز</th>
                                <th class="border-bottom-0">تأكيد موعد الحجز</th>
                                <th class="border-bottom-0">الدكتور</th>
                                <th class="border-bottom-0">حالة الحجز</th>
                                <th>مشاهدة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?> @foreach ($appointments as $item)
                            <?php $i++; ?>
                            <tr>
                                <td> {{ $i }} </td>
                                <td>
                                    <a href="{{ route('appointments.show', $item->id) }}">
                                        {{ $item->client->client_name }}</a>
                                </td>
                                <td> {{ $item->apt_datetime }} </td>
                                <td> {{ $item->remarks }} </td>
                                <td> {{ $item->doctor->name }} </td>
                                <td> {{ $item->status }} </td>

                                <td>
                                    <a href="{{ route('doctor_dashboard.show_appointment', ['id' => $item->id]) }}"
                                        class="btn btn-primary">View</a>
                                </td>
                                <td>
                                    @if($item->status === 'processing')
                                        <form method="POST"
                                            action="{{ route('doctor_dashboard.complete_appointment', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Complete</button>
                                        </form>
                                    @endif

                                    @if($item->status === 'processing')
                                        <form method="POST"
                                            action="{{ route('doctor_dashboard.reject_appointment', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @endif
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

@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}">
</script>
<!-- Ionicons js -->
<script
    src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}">
</script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}">
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
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
