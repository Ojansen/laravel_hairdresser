@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card-deck">
        @foreach($hairdressers as $item)
                <div class="card">
                    <form method="get" action="{{ url('/order', $item->id) }}">
                        @csrf
                    <h4 class="card-header">{{ $item->user->name }}</h4>
                    <div class="card-body">
                        <p>Bio {{ $item->bio }}</p>
                        <br>
                        <h4>Treatments</h4>
                        <table class="table-responsive-sm table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sex</th>
                                </tr>
                            </thead>
                        @foreach($item->hairlink as $hairstyle)
                            @foreach($hairstyle->hairstyle as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>€ {{ $item->price }}</td>
                                    <td>
                                        @if ($item->sex == 0)
                                            Male
                                        @elseif($item->sex == 1)
                                            Female
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    <div class="p-3">
                        <input type="submit" class="btn btn-outline-success" value="Select">
                    </div>
                    </form>
                </div>
        @endforeach
    </div>
</div>
@endsection
