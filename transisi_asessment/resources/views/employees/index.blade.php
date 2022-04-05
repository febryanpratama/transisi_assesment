@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <div class="float-left"><h3>Employee List</h3></div>
                        <div class="float-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanies">
                            Add Data
                          </button></div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($employee as $item=> $employ)
                                <tr>
                                    <th>{{ $employ->name }}</th>
                                    <th>
                                        {{ $employ->company->name }}
                                    </th>
                                    <td>
                                        <a href="{{ url('employees/'.$employ->id) }}" class="btn btn-primary mb-2">Edit</a>

                                        <a href="#">
                                            <form action="{{ url('employees/'.$employ->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> Delete
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $employee->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCompanies" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Companies</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url("employees") }}" method="POST" enctype="multipart/form-data">
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
                            <label for="" class="control-label">Company</label>
                            {{-- <select id='channel_id' class="form-control">
                                <option value='0'>- Search Channel -</option>
                             </select> --}}
                            <select name="company_id" id="company" class="form-control js-example-responsive">
                                <option value="">== Pilihan ==</option>
                                {{-- @foreach ($company as $item=>$com)
                                <option value="{{ $com->id }}">{{ $com->name }}</option>
                                @endforeach --}}
                            </select>
                            @error('company_id')
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
{{-- <script type="text/javascript" src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script type="text/javascript" src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
{{-- <script>
        $(document).ready(function(){
            $("#company").select2();
        });
</script> --}}

<script>

    $(document).ready(function(){
        $("#company").select2({
                placeholder: 'Channel...',
                width: '200px',
                allowClear: true,
                ajax: {
                    url: '/dataforselect2',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        console.log(params);
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            })
        });

    // (function() {
     
    //   $("#channel_id").select2({
    //             placeholder: 'Channel...',
    //             // width: '350px',
    //             allowClear: true,
    //             ajax: {
    //                 url: '/dataforselect2',
    //                 dataType: 'json',
    //                 delay: 250,
    //                 data: function(params) {
    //                     return {
    //                         term: params.term || '',
    //                         page: params.page || 1
    //                     }
    //                 },
    //                 cache: true
    //             }
    //         });
    //     })
    // ();
    
</script>

@endsection
