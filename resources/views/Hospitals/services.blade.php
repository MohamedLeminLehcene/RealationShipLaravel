@extends('layouts.app')

@section('content')
<div class="container">
    <h3>الخدمات</h3>


    <br>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم الخدمة</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($services) && $services -> count() > 0)

            @foreach($services as $service)

            <tr>
                <td>
                    {{$service ->id}}
                </td>
                <td>
                    {{$service ->name}}
                </td>
            </tr>

            @endforeach
           
            @endif
        </tbody>
    </table>


    <form method="POST" action="{{route('save.many.to.many')}}" >

        @csrf
          <div class="form-group">
            <label>اختر الطبيب</label>

            @if(isset($doctorsAll) && $doctorsAll -> count() >0)
           
                <select name="doctorId"  id="" class="form-control">

                    @foreach ($doctorsAll as $doctorsAl )
                    <option value="{{$doctorsAl ->id}}">
                        {{$doctorsAl -> name}}
                    </option>
                    @endforeach
              
            </select>   
            @endif
            
           
          </div>

          <div class="form-group">
            <label>اختر الخدمة أو أكثر</label>
           
            @if(isset($servicesAll) && $servicesAll -> count() >0)
           
            <select name="services[]" id="" multiple class="form-control">

                @foreach ($servicesAll as $serviceAl )
                <option value="{{$serviceAl ->id}}">
                    {{$serviceAl -> name}}
                </option>
                @endforeach
          
        </select>   
        @endif
           
          </div>

  
  
          <button type="submit" class="btn btn-primary">حفظ</button>
        </form>

</div>
@stop