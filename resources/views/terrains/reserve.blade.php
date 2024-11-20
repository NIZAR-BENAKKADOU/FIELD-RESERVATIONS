@extends('layouts.app')

@section('content')
<td style="border: 1px solid black; padding: 10px;">
    <a href="{{ route('make_reservation', ['terrain_id' => $terrain->id]) }}" class="btn btn-primary">Reserve</a>
</td>

@endsection
