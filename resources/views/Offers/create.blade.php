@extends('layouts.app')

@section('content')
<div class="container">


    <h4>{{__('message.Create Offer')}}</h4>
    <form method="POST" action="{{route('offers.store')}}" enctype="multipart/form-data">

      @csrf
        <div class="form-group">
          <label>{{__('message.Offer Name ar')}}</label>
          <input type="text" name="name_ar" class="form-control"  placeholder="{{__('message.Entre Offer Name ar')}}">
          @error('name_ar')
          <small  class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label >{{__('message.Offer Name en')}}</label>
          <input type="text" name="name_en" class="form-control"  placeholder="{{__('message.Entre Offer Name en')}}">
          @error('name_en')
          <small  class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
            <label>{{__('message.Offer Details ar')}}</label>
            <input type="text" name="details_ar" class="form-control"  placeholder="{{__('message.Entre Offer Details ar')}}">
            @error('details_ar')
            <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label >{{__('message.Offer Details en')}}</label>
            <input type="text" name="details_en" class="form-control"  placeholder="{{__('message.Entre Offer Details en')}}">
            @error('details_en')
            <small  class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">{{__('message.Offer Photo')}}</label>
            <input type="file" name="photo" class="form-control"  >
            @error('photo')
            <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
            <label>{{__('message.Offer Price')}}</label>
            <input type="text" name="price" class="form-control" placeholder="{{__('message.Entre Offer Price')}}">
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>


        <button type="submit" class="btn btn-primary">{{__('message.Save')}}</button>
      </form>
</div>
@stop