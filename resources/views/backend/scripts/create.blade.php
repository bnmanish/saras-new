@extends('backend.layouts.app')

@section('title')
    @isset($script) ? 'Edit Script' : 'Create Script'
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            @isset($script) ? 'Edit Script' : 'Create New Script'
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($script) ? route('scripts.update', $script->id) : route('scripts.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Script Name *</label>
                                <input type="text" id="name" name="name" class="form-control @error('name')" value="{{ old('name', $script->name ?? '') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">Script Content *</label>
                                <textarea id="content" name="content" class="form-control @error('content')" rows="10" required>{{ old('content', $script->content ?? '') }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $script->description ?? '') }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $script->status ?? '1') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                                <label for="status" class="form-check-label">Enable this script</label>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> 
                                    @isset($script) ? 'Update Script' : 'Create Script'
                                </button>
                                <a href="{{ route('scripts.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection