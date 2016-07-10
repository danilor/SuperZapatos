@extends('templates.maintemplate')

@section('subtitle')
        {{"Article: "}}<i>{{@$article->name}}</i>
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

    {!! Form::open(['url' => 'save/article','class'=>'validateForm']) !!}
        <input type="hidden" name="id" value="{{ @$article->id }}" />
        <fieldset class="form-group">
            <label for="articleName">{{ "Article Name" }} *</label>
            {!!  Form::text("articleName", @$article->name, ['class'=>'form-control','id'=>'articleName','required'=>'required'])  !!}
            <small class="text-muted">{{ "The article name" }}</small>
        </fieldset>

    <fieldset class="form-group">
        <label for="articleDescription">{{ "Article Description" }} *</label>
        {!!  Form::text("articleDescription", @$article->description, ['class'=>'form-control','id'=>'articleDescription','required'=>'required'])  !!}
        <small class="text-muted">{{ "The article description" }}</small>
    </fieldset>

    <fieldset class="form-group">
        <label for="articlePrice">{{ "Article Price" }} *</label>
        {!!  Form::number("articlePrice", @$article->price, ['class'=>'form-control','id'=>'articlePrice','required'=>'required'])  !!}
        <small class="text-muted">{{ "The article Price" }}</small>
    </fieldset>

    <fieldset class="form-group">
        <label for="articleShelf">{{ "Articles in Shelf" }} *</label>
        {!!  Form::number("articleShelf", @$article->total_in_shelf, ['class'=>'form-control','id'=>'articleShelf','required'=>'required'])  !!}
        <small class="text-muted">{{ "The amount of articles in shelf" }}</small>
    </fieldset>

    <fieldset class="form-group">
        <label for="articleVault">{{ "Articles in Vault" }} *</label>
        {!!  Form::number("articleVault", @$article->total_in_vault, ['class'=>'form-control','id'=>'articleVault','required'=>'required'])  !!}
        <small class="text-muted">{{ "The amount of articles in vault" }}</small>
    </fieldset>

    <fieldset class="form-group">
        <label for="articleVault">{{ "Store" }} *</label>
        {!!  Form::select('store_id', $stores, @$article->store_id,['class'=>'form-control'])  !!}
        <small class="text-muted">{{ "The amount of articles in vault" }}</small>
    </fieldset>





        <button type="submit" class="btn btn-primary">{{ "Save"  }}</button>
    {!! Form::close() !!}

@stop