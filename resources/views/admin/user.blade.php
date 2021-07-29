@extends('layouts.master')
@section('title')
    Users
@endsection

@section('content')
    
<div class="row"> 

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Users</h4>
        </div>
        @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
           @endif
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Phone
                </th>
                <th>
                    Email
                  </th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                @if ($user->usertype=="")
                <tr>
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
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 

@endsection
@section('scripts')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
@endsection
