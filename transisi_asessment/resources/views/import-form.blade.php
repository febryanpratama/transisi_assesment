@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <div class="float-left"><h3>IMPORT</h3></div>
                        {{-- <div class="float-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanies">
                            Add Data
                          </button></div> --}}
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Import your CSV</label>
                                    <input type="file" name="file" class="form-control">
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