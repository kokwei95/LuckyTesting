@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Winner Records (Admin View)</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Created At.</th>
                                <th>Type</th>
                                <th>Winner Number</th>
                                <th>Winner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data) && $data->count())
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->winner_number }}</td>
                                        <td>{{ $value->name }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! $data->links() !!}
                </div>
            <div class="card-footer text-center"><a href="{{route('drawForm')}}" type="button" class="btn btn-warning">Draw Now!</a></div>
            </div>
        </div>
    </div>
</div>
@endsection