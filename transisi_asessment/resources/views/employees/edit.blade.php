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
                    <form action="{{ url('employees/'.$id) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="" class="control-label">Company</label>
                                    <select name="company_id" id="company" class="form-control">
                                        <option value="" selected hidden>== Pilihan ==</option>
                                        @foreach ($company as $item=>$com)
                                        <option value="{{ $com->id }}">{{ $com->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
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

<script type="text/javascript" src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script>
        $(document).ready(function(){
            $("#company").select2();
        });
</script>

@endsection