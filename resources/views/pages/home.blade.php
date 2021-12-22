@extends('main')
@section('content')


<a class="nav-link" href="" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
    {{ Auth::user()->name }}
</a>
<a class="logg" href="{{ route('logout') }}" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
            <h2>Laravel CRUD using Ajax</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNew" class="btn btn-success">Add New</button></div>
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->fullname }}</td>
                        <td>{{ $users->address }}</td>
                        <td>{{ $users->contact }}</td>
                        <td>{{ $users->city }}</td>
                        <td>{{ $users->country }}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $users->id }}">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $users->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $user->links() !!}
        </div>
    </div>
</div>


<!-- boostrap model -->
<div class="modal fade" id="ajax-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditForm" name="addEditForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
@endsection