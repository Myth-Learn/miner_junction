@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>SUBSCRIBERS</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone-No</th>            
            <th width="280px">Action</th>
        </tr>
    @foreach ($subscribers as $subscriber)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $subscriber->full_name }}</td>
        <td>{{ $subscriber->email }}</td>
        <td>{{ $subscriber->phone_number }}</td>
        <td>
            {!! Form::open(['method' => 'DELETE','route' => ['subscriber.destroy', $subscriber->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $subscribers->render() !!}
@endsection
