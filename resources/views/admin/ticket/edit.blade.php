@extends('layouts.admin.app', ['pageTitle' => 'Edit Ticket'])

@section('content')
<div class="main-content-body">
    <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <p class="card-title my-0">{{ $pageTitle }}</p>
                <div class="d-flex">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-list d-inline"></i> Ticket List
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="subject" class="form-label">{{ __('Subject') }}</label>
                        <input type="text" class="form-control" name="subject" value="{{ old('subject', $ticket->subject) }}" placeholder="Subject" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priority" class="form-label">{{ __('Priority') }}</label>
                        <select name="priority" class="form-control select2" required>
                            <option value="">Select Priority</option>
                            <option value="low" {{ old('priority', $ticket->priority) == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $ticket->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $ticket->priority) == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="status" class="form-label">{{ __('Status') }}</label>
                        <select name="status" class="form-control select2" required>
                            <option value="open" {{ old('status', $ticket->status) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="in_progress" {{ old('status', $ticket->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="resolved" {{ old('status', $ticket->status) == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="closed" {{ old('status', $ticket->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control" name="description" rows="4" placeholder="Describe your issue..." required>{{ old('description', $ticket->description) }}</textarea>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fa fa-save"></i> Update Ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
