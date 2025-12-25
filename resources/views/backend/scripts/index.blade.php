@extends('backend.layouts.app')

@section('title')
    Scripts Management
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Script Management</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('scripts.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus me-1"></i> Add New Script
                            </a>
                        </div>
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($scripts as $script)
                                        <tr>
                                            <td>{{ $script->name }}</td>
                                            <td>{{ Str::limit($script->description, 50) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $script->status ? 'success' : 'secondary' }}">
                                                    {{ $script->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $script->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('scripts.edit', $script->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('scripts.destroy', $script->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
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
</div>
@endsection