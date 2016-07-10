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
            <th>{{ 'ACTION'  }}</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>{{ 'ID'  }}</th>
            <th>{{ 'NAME'  }}</th>
            <th>{{ 'ADDRESS'  }}</th>
            <th>{{ 'ACTION'  }}</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@stop