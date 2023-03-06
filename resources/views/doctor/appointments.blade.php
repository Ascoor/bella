@extends('layouts.app')
@section('css')

@endsection
@section('content')
				<!-- row -->
				<div class="row">
				<div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#add_apt_modal">اضافة حجز</a>
                    </div>
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
                                        <a class="modal-effect btn btn-sm btn-success" data-effect="effect-scale"
                                            data-id="{{ $item->id }}" data-doctor_name="{{ $item->doctor->name }}"
                                            data-status="{{ $item->status }}"
                                            data-client_name="{{ $item->client->client_name }}"
                                            data-edited_by="{{ $item->edited_by }}"
                                            data-client_phone="{{ $item->client->client_phone }}"
                                            data-apt_datetime="{{ $item->apt_datetime }}"
                                            data-remarks="{{ $item->remarks }}"
                                            data-apt_time="{{ $item->apt_time }}" data-toggle="modal"
                                            href="#show_apt_modal" title="مشاهدة">
                                            <i class="las la-eye"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-id="{{ $item->id }}" data-doctor_id="{{ $item->doctor->id }}"
                                            data-doctor_name="{{ $item->doctor->name }}"
                                            data-status="{{ $item->status }}"
                                            data-client_name="{{ $item->client->client_name }}"
                                            data-edited_by="{{ $item->edited_by }}"
                                            data-client_phone="{{ $item->client->client_phone }}"
                                            data-apt_datetime="{{ $item->apt_datetime }}"
                                            data-remarks="{{ $item->remarks }}" data-toggle="modal"
                                            href="#edit_apt_modal" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-id="{{ $item->id }}"
                                            data-client_name="{{ $item->client->client_name }}" data-toggle="modal"
                                            href="#delete_apt_modal" title="حذف">
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
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
