@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Expense Types</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExpenseTypeModal">Add Expense Type</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseTypes as $expenseType)
                                    <tr>
                                        <td>{{ $expenseType->id }}</td>
                                        <td>{{ $expenseType->name }}</td>
                                        <td>{{ $expenseType->value }}</td>
                                        <td>{{ $expenseType->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editExpenseTypeModal{{ $expenseType->id }}">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteExpenseTypeModal{{ $expenseType->id }}">Delete</button>
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

    <!-- Add Expense Type Modal --><!-- Add Expense Type Modal -->
<div class="modal fade" id="addExpenseTypeModal" tabindex="-1" role="dialog" aria-labelledby="addExpenseTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExpenseTypeModalLabel">Add Expense Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addExpenseTypeForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" class="form-control" id="value" name="value">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addExpenseTypeBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Expense Type Modal -->
<div class="modal fade" id="deleteExpenseTypeModal" tabindex="-1" role="dialog" aria-labelledby="deleteExpenseTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteExpenseTypeModalLabel">Delete Expense Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this expense type?</p>
                <p><strong>Name:</strong> <span id="deleteExpenseTypeName"></span></p>
                <p><strong>Value:</strong> <span id="deleteExpenseTypeValue"></span></p>
                <p><strong>Description:</strong> <span id="deleteExpenseTypeDescription"></span></p>
                <form id="deleteExpenseTypeForm" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                <button type="submit" class="btn btn-danger" form="deleteExpenseTypeForm">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
