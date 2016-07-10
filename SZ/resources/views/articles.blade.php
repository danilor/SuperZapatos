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
        </tr>
        </tfoot>
        <tbody>
            @foreach(\App\article::select('articles.*','stores.name AS store_name')->leftJoin('stores', 'stores.id', '=', 'articles.store_id')->get() AS $s)
                <tr>
                    <td>{{ $s->id  }}</td>
                    <td>{{ $s->name  }}</td>
                    <td>{{ $s->description  }}</td>
                    <td>{{ number_format($s->price,2)  }}</td>
                    <td>{{ $s->total_in_shelf  }}</td>
                    <td>{{ $s->total_in_vault  }}</td>
                    <td>[{{ $s->store_id }}]{{ $s->store_name  }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop