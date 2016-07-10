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
            <th>{{ 'DESCRIPTION'  }}</th>
            <th>{{ 'PRICE'  }}</th>
            <th>{{ 'IN SHELF'  }}</th>
            <th>{{ 'IN VAULT'  }}</th>
            <th>{{ 'STORE'  }}</th>
            <th>{{ 'MODIFY'  }}</th>
            <th>{{ 'DELETE'  }}</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>{{ 'ID'  }}</th>
            <th>{{ 'NAME'  }}</th>
            <th>{{ 'DESCRIPTION'  }}</th>
            <th>{{ 'PRICE'  }}</th>
            <th>{{ 'IN SHELF'  }}</th>
            <th>{{ 'IN VAULT'  }}</th>
            <th>{{ 'STORE'  }}</th>
            <th>{{ 'MODIFY'  }}</th>
            <th>{{ 'DELETE'  }}</th>
        </tr>
        </tfoot>
        <tbody>
            @foreach(\App\Classes\Articles::getArticles() AS $s)
                <tr>
                    <td>{{ $s->id  }}</td>
                    <td>{{ $s->name  }}</td>
                    <td>{{ $s->description  }}</td>
                    <td>{{ number_format($s->price,2)  }}</td>
                    <td>{{ $s->total_in_shelf  }}</td>
                    <td>{{ $s->total_in_vault  }}</td>
                    <td>[{{ $s->store_id }}]{{ $s->store_name  }}</td>
                    <td>
                        <a href="/article/{{$s->id}}" class="btn btn-info" role="button">{{ "Modify"  }}</a>
                    </td>
                    <td>
                        <a href="/delete/article/{{$s->id}}" class="btn btn-danger" role="button">{{ "Delete"  }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop