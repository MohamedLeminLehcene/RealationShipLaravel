@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-success">
    {{Session::get('error')}}
</div>
@endif

    <h4>{{__('message.All Offer')}}</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">{{__('message.Offer Name')}}</th>
          <th scope="col">{{__('message.Offer Details')}}</th>
          <th scope="col">{{__('message.Offer Price')}}</th>
          <th scope="col">{{__('message.Offer Photo')}}</th>
          <th scope="col">{{__('message.Actions')}}</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($offers as $offer )
        <tr>
          <th scope="row">{{$offer -> id}}</th>
          <td>{{$offer -> name}}</td>
          <td>{{$offer -> details}}</td>
          <td>{{$offer -> Price}}</td>
          <td>
            <img src="{{asset('Images/Offer/'.$offer->Photo)}}" width="100px" alt="">
          </td>
          <td>
            <a href="{{route('offers.destroy',$offer -> id)}}" class="btn btn-danger">{{__('message.DELETE')}}</a>
            <a href="{{route('offers.edit',$offer->id)}}" class="btn btn-primary">{{__('message.UPDATE')}}</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
</div>
@stop