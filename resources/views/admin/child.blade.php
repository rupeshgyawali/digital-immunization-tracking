@extends('layouts.master')
@section('title')
    User Profile
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Child List</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                 <th>
                     ID
                  </th>
                <th>
                  Name
                </th>
                <th>
                  DOB
                </th>
                <th>
                  Birth Place
                </th>
                <th>
                  Father Phone
                </th>
                <th>
                  Father Name
                </th>
                <th>
                  Mother Name
                </th>
                <th>
                  Temporary Address
                </th>
                <th>
                  Permanent Address
                </th>
                
               

              </thead>
              <tbody>
                @foreach ($childs as $child)
                <tr>
                  <td>{{$child->id}}</td>
                  <td>{{$child->name}}</td>
                  <td>{{$child->dob}}</td>
                  <td>{{$child->birth_place}}</td>
                  <td>{{$child->father_phn}}</td>
                  <td>{{$child->father_name}}</td>
                  <td>{{$child->mother_name}}</td>
                  <td>{{$child->temporary_addr}}</td>
                  <td>{{$child->permanent_addr}}</td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>  


@endsection