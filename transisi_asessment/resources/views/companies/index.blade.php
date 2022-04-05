@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <div class="float-left"><h3>Companies List</h3></div>
                        <div class="float-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanies">
                            Add Data
                          </button></div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('pdf/companies') }}" method="POST">
                    <div class="d-flex inline-block mb-3">
                        <div class="">
                                @csrf
                                <select name="company_id" id="" class="form-control">
                                    <option value=""> == Company == </option>
                                    @foreach ($data as $item=>$comp)
                                        <option value="{{ $comp->id }}"> {{ $comp->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class=" ml-2 btn btn-success">Export PDF</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item=>$key)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->email }}</td>
                                    <td><img src="{{ asset('/storage/company/' . $key->logo) }}" alt="" title="" width="100" height="100"></td>
                                    <td>{{ $key->website }}</td>
                                    <td>
                                        <a href="{{ url('companies/'.$key->id) }}" class="btn btn-primary mb-2">Edit</a>
                                        {{-- <a href="#"><form action="{{ url('companies/'.$key->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            </form>Delete</a> --}}
                                        <a href="#">
                                            <form action="{{ url('companies/'.$key->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> Delete
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $data->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCompanies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Companies</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url("companies") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" value="{{ old('name') }}">
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
                            @enderror" value="{{ old('email') }}">
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
                            @enderror" value="{{ old('logo') }}">
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
                            @enderror" value="{{ old('website') }}">
                            @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
