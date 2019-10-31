@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card-deck">
        <div class="card">
            <h3 class="card-header">Appointments</h3>

            <div class="card-body">
                <table class="table table-responsive-sm">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($user->order as $item)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($item->date)->format('H:m') }}</td>
                        <td>{{ $item->description }}</td>
                        <td><a class="btn btn-outline-info" href="#">Cancel</a> </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="card-footer">
                <a class="btn btn-outline-success" href="/order">
                    New appointment
                </a>
            </div>
        </div>

        <div class="card">
            <h3 class="card-header">Info</h3>

            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection
