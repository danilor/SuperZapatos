@extends('templates.maintemplate')

@section('subtitle')
        {{"Store: "}}<i>{{@$store->name}}</i>
    @stop

@section('content')

    @foreach ($errors->all() as $message)
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            {{ $message }}
        </div>
    @endforeach

    {!! Form::open(['url' => 'save/store','class'=>'validateForm']) !!}
        <input type="hidden" name="id" value="{{ @$store->id }}" />
        <fieldset class="form-group">
            <label for="storeName">{{ "Store Name" }} *</label>
            {!!  Form::text("storeName", @$store->name, ['class'=>'form-control','id'=>'storeName','required'=>'required'])  !!}
            <small class="text-muted">{{ "The store name" }}</small>
        </fieldset>

        <fieldset class="form-group">
            <label for="storeAddress">{{ "Store Address" }} *</label>
            {!!  Form::text("storeAddress", @$store->address, ['class'=>'form-control','id'=>'storeAddress','required'=>'required'])  !!}
            <small class="text-muted">{{ "The store address" }}</small>
        </fieldset>
        <button type="submit" class="btn btn-primary">{{ "Save"  }}</button>
    {!! Form::close() !!}

@stop