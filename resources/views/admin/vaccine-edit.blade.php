@extends('layouts.master')
@section('title')
    Edit Vaccine Details
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header"> 
                     <div class="card-title">
                        <h4>Edit Vaccine</h4>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="card-body">
                            <form action="/update-vaccine/{{$vaccines->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="mb-3">
                                    <label>Vaccine Name</label>
                                    <input type="text" name="name" value="{{$vaccines->name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="textbox" name="description" value="{{$vaccines->description}}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/vaccine" class="btn btn-danger">Cancel</a>
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
