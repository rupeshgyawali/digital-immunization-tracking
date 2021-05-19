@extends('layouts.master')
@section('title')
    Vaccine Details
@endsection

@section('content')
    
<div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Vaccine Details</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Description
                </th>
              </thead>
              <tbody>
                @foreach ($vaccines as $vaccine)
                <tr>
                  <td>
                   {{$vaccine->name}}
                  </td>
                  <td>
                    {{$vaccine->description}}
                  </td>
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
