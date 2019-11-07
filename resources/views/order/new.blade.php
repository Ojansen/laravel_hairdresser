@extends('layouts.app')

@section('content')
<div class="col-md-12">

    @if($choice == false)
        <div class="card-deck">
            @foreach($hairdressers as $slave)
            <div class="card">
                <h4 class="card-header">{{ $slave->user->name }}</h4>
                <div class="card-body">
                    <p>Bio {{ $slave->bio }}</p>
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
                    @foreach($slave->hairlink as $hairstyle)
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
                <div class="card-footer">
                    <a href="{{ url('/order/'. $slave->id) }}" class="btn btn-outline-success" >Select</a>
                </div>
            </div>
            @endforeach
        </div>
    @elseif($choice == true)
        <div class="card">
            <h3 class="card-header">New appointment</h3>
            <div class="card-body">
                <p>Selected hairdresser {{ $hairdresser->user->name }}</p>

                <form method="post" action="{{ url('/order/') }}">
                    @csrf
                    <input type="hidden" name="hair_id" value="{{ $hairdresser->id }}">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" cols="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <select class="form-control" name="time" required>
                            @php
                            $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
                            @endphp
                            @for ($i = 0; $i < 10; $i++)
                                <option value="{{ $times[$i] }}">{{ $times[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success" value="Create">
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

<script>

</script>
