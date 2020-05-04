@extends('layouts.app')
@section('content')

<div class="row">
    <div class="tab">
        <a href="/users/create">ADD</a>
    </div>
</div>
<div class="row">
    <table dir="ltr" class="table">
        <thead>
            <th>name</th>
            <th>name</th>
            <th>name</th>
            <th>name</th>
            <th>name</th>
            <th>name</th>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr scope="row">
                <td>{{$row->name}}</td>
                <td>{{$row->bod}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->email}}</td>
                <td>
                    @if ($row->role == 1)مدير
                    @elseif($row->role == 2)مشرف
                    @elseif($row->role == 3)معلم
                    @elseif($row->role == 4)أب
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
