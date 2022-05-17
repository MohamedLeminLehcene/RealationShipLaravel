@extends('layouts.app')

@section('content')
<div class="container">


    <h4>{{__('message.Update Offer')}}</h4>
    <form method="POST" action="{{route('offers.update',$offer->id)}}" enctype="multipart/form-data">

      @csrf
        <div class="form-group">
          <label>{{__('message.Offer Name ar')}}</label>
          <input type="text" name="name_ar" value="{{$offer -> Name_ar}}" class="form-control"  >
          @error('name_ar')
          <small  class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label >{{__('message.Offer Name en')}}</label>
          <input type="text" name="name_en" value="{{$offer -> Name_en}}" class="form-control"  >
          @error('name_en')
          <small  class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>

        <input type="text" name="id" value="{{$offer -> id}}" class="form-control"  >

        <div class="form-group">
            <label>{{__('message.Offer Details ar')}}</label>
            <input type="text" value="{{$offer -> details_ar}}" name="details_ar" class="form-control" >
            @error('details_ar')
            <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label >{{__('message.Offer Details en')}}</label>
            <input type="text"  value="{{$offer -> details_en}}" name="details_en" class="form-control" >
            @error('details_en')
            <small  class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group">
           <img width="100px" src="{{asset('Images/Offer/'.$offer -> Photo)}}" alt="">
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
            <input type="text" value="{{$offer -> Price}}" name="price" class="form-control" >
            @error('price')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
          </div>


        <button type="submit" class="btn btn-primary">{{__('message.Edit')}}</button>
      </form>
</div>
@stop