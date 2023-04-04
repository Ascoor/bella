@extends('layouts.app')
@section('title')
التقرير
@stop

@section('css')
@endsection
@section('content')<div class="container mt-5">
    <h1 class="mb-5">Appointment Report</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    Client Information
                </div>
                <div class="card-body">
                    <p><strong>Client Name:</strong> {{ $client_name }}</p>
                    <p><strong>Age:</strong> {{ $age }}</p>
                    <p><strong>Gender:</strong> {{ $gender }}</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Appointment Information
                </div>
                <div class="card-body">
                    <p><strong>Date:</strong> {{ $apt_date }}</p>
                    <p><strong>Remarks:</strong> {{ $remarks }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Accompanying Notes and Documents
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="notes" class="form-label">Accompanying Notes:</label>
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="documents" class="form-label">Accompanying Documents:</label>
                            <input type="file" class="form-control" id="documents" name="documents[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Report Table</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Report</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

            </tbody>
        </table>
    </div>
</div>


<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->

@endsection
