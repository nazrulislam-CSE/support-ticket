@extends('layouts.admin.app', ['pageTitle' => 'Dashboard'])

@section('content')
<div class="breadcrumb-header justify-content-between">
    <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle ?? 'Dashboard' }}</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="main-content-body">
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <p class="card-title my-0">{{ $pageTitle ?? 'Page Title'}} <span class="badge bg-danger side-badge" style="font-size:17px;">{{ count($tickets) }}</span> </p>

                    <div class="d-flex">
                        {{-- <a href="{{ route('user.ticket.create') }}" class="btn btn-success me-2">
                            <i class="fas fa-plus d-inline"></i> Add Ticket
                        </a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-datatable" class="border-top-0 table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">SL</th>
                                    <th class="border-bottom-0">Customer Name</th>
                                    <th class="border-bottom-0">Subject</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Priority</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $key => $ticket)
                                <tr>
                                    <td class="col-1">{{ $key + 1 }}</td>
                                    <td>{{ $ticket->user->name ?? 'N/A' }}</td>
                                    <td>{{ $ticket->subject ?? 'N/A' }}</td>
                                    <td>
                                        @if ($ticket->status == 'open')
                                            <a href="#" class="badge bg-pill bg-success">Open</a>
                                        @elseif ($ticket->status == 'in_progress')
                                            <a href="#" class="badge bg-pill bg-warning">In Progress</a>
                                        @elseif ($ticket->status == 'resolved')
                                            <a href="#" class="badge bg-pill bg-info">Resolved</a>
                                        @else
                                            <a href="#" class="badge bg-pill bg-danger">Closed</a>
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($ticket->priority) }}</td>
                                    <td>
                                        <a href="{{ route('admin.ticket.edit', $ticket->id) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.ticket.delete', $ticket->id) }}"  class="btn btn-danger btn-sm" title="Delete Ticket" id="delete"><i class="fa fa-trash"></i></a>
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
    <!-- End Row -->
</div>
@endsection
