@extends('layouts.master')
@section('title')
    Edit User Role
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header"> 
                     <div class="card-title">
                        <h4>Edit Role</h4>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="card-body">
                            <form action="/update-role/{{$users->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{$users->name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Roles</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/registerHP" class="btn btn-danger">Cancel</a>
                            </form>
                         </div>
                     </div> 
                 </div>
             </div>
         </div>
    </div>
</div>

@endsection

@section('scripts')  
@endsection
