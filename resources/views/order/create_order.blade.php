@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card-deck">
                <div class="card">
                    <h3 class="card-header">Select date</h3>
                    <div class="card-body">
                        <form method="post">
                            <select>
                            @foreach($times as $item)
                                <option value="">
                                    {{ \Carbon\Carbon::parse($item)->format('H:i') }}
                                </option>
                            @endforeach
                            </select>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
