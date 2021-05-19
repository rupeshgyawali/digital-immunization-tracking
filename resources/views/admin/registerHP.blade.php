@extends('layouts.master')
@section('title')
    Registered User
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered Roles</h4>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
           @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary" style="text-align: center">
                <th>
                  ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  Phone
                </th>
                <th>
                  E-mail
                </th>
                <th>
                  Role
                </th>
                <th colspan="2">
                  Actions
                </th>
              </thead>
              <tbody style="text-align: center">
                @foreach ($users as $user)
                <tr>
                  <td>
                    {{$user->id}}
                   </td>
                  <td>
                   {{$user->name}}
                  </td>
                  <td>
                    {{$user->phone}}
                  </td>
                  <td>
                    {{$user->email}}
                  </td>
                  <td>
                    {{$user->usertype}}
                  </td>
                    <td>
                    <a href="/edit-role/{{$user->id}}" class="btn btn-success">EDIT</a>
                    </td>  
                    <td >
                      <form action="/delete-role/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                       </form> 
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