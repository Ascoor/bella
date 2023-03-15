@extends('layouts.app')
@section('title')
الحجوزات
@stop
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
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('rejected'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('rejected') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">

    <div class="row">
        <div class="col-12">
        <div class="card mb-3">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-hover">
                        <thead class="table-danger text-center">
                            <tr >
                                <th>#</th>
                                <th>إسم العميل</th>

                                <th> موعد الحجز</th>

                                <th>حالة الحجز</th>
                                <th>مشاهدة</th>

                                <th>تم</th>
                                <th>إلغاء</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i = 0; ?> @foreach ($appointments as $item)
                            <?php $i++; ?>
                            <tr>
                                <td> {{ $i }} </td>
                                <td>

                                        {{ $item->client->client_name }}
                                </td>
                                                                <td> {{ $item->remarks }} </td>

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
                                </td>
                                <td>
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

</div>
@endsection
@section('js')

@endsection
