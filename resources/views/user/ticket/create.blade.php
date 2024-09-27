@extends('layouts.user.app', ['pageTitle' => $pageTitle])
@section('content')
    <div class="main-content-body">
        <form action="{{ route('user.ticket.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <p class="card-title my-0">{{ $pageTitle }}</p>
                    <div class="d-flex">
                        <a href="{{ route('user.ticket.index') }}" class="btn btn-secondary me-2">
                            <i class="fas fa-list d-inline"></i> Ticket List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subject" class="form-label">{{ __('Subject') }}</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="priority" class="form-label">{{ __('Priority') }}</label>
                            <select name="priority" class="form-control select2" required>
                                <option value="">Select Priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe your issue..." required></textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-plus"></i> Add Ticket</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
