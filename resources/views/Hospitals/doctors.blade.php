@extends('layouts.app')

@section('content')
<div class="container">



    <h4>الأطباء</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">الاسم</th>
          <th scope="col">التخصص</th>
          <th scope="col">الإجراءات</th>
        </tr>
      </thead>
      <tbody>

        @if(isset($doctors) && $doctors -> count() > 0)

        @foreach($doctors as $doctor)
        <tr>
          <th scope="row">{{$doctor -> id}}</th>
          <td>{{$doctor -> name}}</td>
          <td>{{$doctor -> title}}</td>
          <td>
            <a href="{{route('get.services.doctor.by.id',$doctor->id)}}" class="btn btn-success">عرض الخدمات</a>
          </td>
        </tr>
        @endforeach
        
        @endif

      </tbody>
    </table>
</div>
@stop