@extends('templates.maintemplate')

@section('subtitle')
        {{"Stores"}}
    @stop

@section('content')
    <table class="display datatable" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>{{ 'ID'  }}</th>
            <th>{{ 'NAME'  }}</th>
            <th>{{ 'ADDRESS'  }}</th>
            <th>{{ 'MODIFY'  }}</th>
            <th>{{ 'DELETE'  }}</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>{{ 'ID'  }}</th>
            <th>{{ 'NAME'  }}</th>
            <th>{{ 'ADDRESS'  }}</th>
            <th>{{ 'MODIFY'  }}</th>
            <th>{{ 'DELETE'  }}</th>
        </tr>
        </tfoot>
        <tbody>
            @foreach(\App\store::all() AS $s)
                <tr>
                    <td>{{ $s->id  }}</td>
                    <td>{{ $s->name  }}</td>
                    <td>{{ $s->address  }}</td>
                    <td>
                        <a href="../store/{{$s->id}}" class="btn btn-info" role="button">{{ "Modify"  }}</a>
                    </td>
                    <td>
                        <a href="../delete/store/{{$s->id}}" class="btn btn-danger" role="button">{{ "Delete"  }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop