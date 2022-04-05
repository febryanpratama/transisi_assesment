@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <div class="float-left"><h3>Edit Company</h3></div>
                        {{-- <div class="float-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanies">
                            Add Data
                          </button></div> --}}
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('companies/'.$id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name')
                                        is-invalid
                                    @enderror" value="{{ $data->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror" value="{{ $data->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Logo</label>
                                    <input type="file" name="logo" class="form-control @error('logo')
                                        is-invalid
                                    @enderror" value="{{ $data->logo }}">
                                    @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">website</label>
                                    <input type="text" name="website" class="form-control @error('website')
                                        is-invalid
                                    @enderror" value="{{ $data->website }}">
                                    @error('website')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="form-control btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection