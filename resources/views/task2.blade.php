@extends('app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Date</th>
            <th>Phone</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->Date}}</td>
                <td>{{$order->Phone}}</td>
                <td>{{$order->Name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
