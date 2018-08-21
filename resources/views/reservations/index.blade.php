@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Reservations</h4>
      


        
        
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Date_in</th>
              <th width="200">Date_out</th>
              <th width="200">Client_id</th>
              <th width="200">Room_id</th>
            </tr>
          </thead>
          <tbody>
              
              @foreach($reservation as $res)

              <tr>
                  
                
                <td>{{ $res->date_in }}</td>
                <td>{{ $res->date_out }}</td>
                <td>{{ $res->client_id }}</td>
                <td>{{ $res->room_id }}</td>
              </tr>
              
              @endforeach

             
              
                      </tbody>
        </table>

        
      </div>
    </div>
@endsection