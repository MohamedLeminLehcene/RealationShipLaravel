@extends('layouts.app')

@section('content')
<div class="container">



    <h4>المستشفيات</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">الاسم</th>
          <th scope="col">العنوان</th>
          <th scope="col">الإجراءات</th>
        </tr>
      </thead>
      <tbody>

        @if(isset($hospitals) && $hospitals -> count() > 0)

        @foreach($hospitals as $hospital)
        <tr>
          <th scope="row">{{$hospital -> id}}</th>
          <td>{{$hospital -> name}}</td>
          <td>{{$hospital -> address}}</td>
          <td>
            <a href="{{route('doctors.with.id',$hospital->id)}}" class="btn btn-success">عرض الأطباء</a>
            <a href="{{route('hospital.delete',$hospital->id)}}" class="btn btn-danger">حذف</a>
          </td>
        </tr>
        @endforeach
        
        @endif

      </tbody>
    </table>
</div>
@stop