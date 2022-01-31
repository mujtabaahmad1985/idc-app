@php
    $start = "00:00";
    $end = "23:30";

    $tStart = strtotime($start);
    $tEnd = strtotime($end);
    $tNow = $tStart;
while($tNow <= $tEnd){



 $now = date("H:i",$tNow);
 $tNow = strtotime('+5 minutes',$tNow);
 $time_slots[] = $now;
}$current_hour = date('H');
    $current_min = date('i');
    $current_slot = $current_hour.":".$current_min;
    if($current_min<=15){
        $current_slot =$current_hour.":00";
    }

    if($current_min>15 && $current_min<=30){
        $current_slot =$current_hour.":15";
    }

    if($current_min>30 && $current_min<=45){
        $current_slot =$current_hour.":30";
    }

    if($current_min>45 && $current_min<=59){
        $current_slot =$current_hour.":45";
    }






@endphp
<div class="row">
    <div class="col-md-8">
        <div class="card">
            @foreach($availability as $doctor)
            <div class="card-body">

                @if(isset($doctor['availability']['monday']) && !empty($doctor['availability']['monday']))

                    @foreach( $doctor['availability']['monday'] as $key=>$value)

                        <div class="row add-availability  @if($key>0) monday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="monday" data-availablity="{!! $value['availability_id'] !!}">
                            <div class="col-sm-4 end_time_slot monday">
                                <div class="form-group">
                                    @if($key==0) <label>Monday</label> @endif
                                <select class="end_time validate" required name="location">
                                    <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-sm-3 start_time_slot ">


                                <div class="form-group">
                                @if($key==0) <label>Start Time</label> @endif
                                <select class="start_time validate" required name="start_time">
                                    @foreach($time_slots as $slots)
                                        @if(empty($value['start_time']))
                                        <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                        @else
                                            <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-3 end_time_slot">
                                @if($key==0) <label>End Time</label> @endif

                                <select class="end_time validate" required name="end_time">
                                    @foreach($time_slots as $slots)
                                        @if(empty($value['end_time']))
                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                        @else
                                            <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                        @endif
                                            @endforeach
                                </select>

                            </div>

                            <div class="col-sm-2 col-md-1 @if($key==0) mt-4 @else mt-2 @endif">



                                <div class="btn-group">
                                    @if($key==0)    <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                       data-day="monday">+</a>@endif
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn" data-availablity="{!! $value['availability_id'] !!}" data-day="monday" data-day="monday">-</a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="monday" data-availablity="">

                        <div class="col-md-4 end_time_slot">
                            <div class="form-group">
<label> Monday</label>
                            <select class="end_time validate" required name="location">
                                <option value="" selected>N/A</option>@foreach($locations as $location)

                                    <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                @endforeach
                            </select>
                            </div>

                        </div>
                        <div class="col-md-3 start_time_slot ">


                            <div class="form-group">
                                <label style="visibility: hidden">Start Time</label>
                            <select class="start_time validate" required name="start_time">
                                <option value="">N/A</option>
                                @foreach($time_slots as $slots)

                                        <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                @endforeach
                            </select>
                            </div>

                        </div>
                        <div class="col-md-3 end_time_slot no-padding">

<div class="form-group">
    <label style="visibility: hidden">Start Time</label>
                            <select class="end_time validate" required name="end_time">
                                <option value="">N/A</option>
                                @foreach($time_slots as $slots)

                                        <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2 mt-4">
                            <div class="btn-group mr-2">
                                <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                   data-day="monday">+</a>
                                <a type="button" href="#!" class="btn btn-danger remove-availability-btn" data-day="monday">-</a>

                            </div>

                        </div>
                    </div>
                @endif



                {{--//////////////////////////////////////////// TUESDAY ///////////////////////////--}}

                    @if(isset($doctor['availability']['tuesday']) && !empty($doctor['availability']['tuesday']))

                        @foreach( $doctor['availability']['tuesday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) tuesday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="tuesday" data-availablity="{!! $value['availability_id'] !!}">



                                <div class="col-md-4 end_time_slot tuesday">

                                    <div class="form-goup">
                                        @if($key==0) <label>Tuesday</label>  @endif
                                    <select class="end_time validate" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                </div>

                                </div>
                                <div class="col-md-3 start_time_slot ">


                                    <div class="form-group">
                                        @if($key==0)  <label style="visibility: hidden">Start Time</label>@endif
                                        <select class="start_time validate" required name="start_time">
                                            @foreach($time_slots as $slots)
                                                @if(empty($value['start_time']))
                                                    <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                                @else
                                                    <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>



                                </div>
                                <div class="col-md-3 end_time_slot no-padding">

                                    <div class="form-group">
                                        @if($key==0)      <label style="visibility: hidden">End Time</label>@endif
                                    <select class="end_time validate" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-2  @if($key==0)mt-4 @else mt-2 @endif">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                           data-day="tuesday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn" data-availablity="{!! $value['availability_id'] !!}" data-day="tuesday">-</a>

                                    </div>

                                </div>


                            </div>
                        @endforeach
                    @else

                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="tuesday" data-availablity="">

                            <div class="input-field col-sm-4 end_time_slot">

<div class="form-group">
    <label>Tuesday</label>
                                <select class="end_time validate" required name="location">
                                    <option value="" selected>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                    @endforeach
                                </select>
                            </div>

                            </div>
                            <div class="col-sm-3 start_time_slot ">

                                <div class="form-group">
                                    <label style="visibility: hidden">End Time</label>


                                <select class="start_time validate" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-sm-3 end_time_slot">

                                <div class="form-group">
                                    <label style="visibility: hidden">End Time</label>
                                <select class="end_time validate" required name="end_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>

                                <div class="col-md-2 mt-4">
                                    <div class="btn-group mr-2">
                                        <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                           data-day="monday">+</a>
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn" data-day="tuesday">-</a>

                                    </div>

                                </div>

                        </div>

                    @endif

                {{--//////////////////////////////////////////// WEDNESDAY ///////////////////////////--}}
                    @if(isset($doctor['availability']['wednesday']) && !empty($doctor['availability']['wednesday']))

                        @foreach( $doctor['availability']['wednesday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) wednesday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="wednesday" data-availablity="{!! $value['availability_id'] !!}">

                                <div class="col-sm-4 end_time_slot wednesday">

                                    <div class="form-group">

                                        @if($key==0) <label>Wednesday</label>  @endif

                                    <select class="end_time validate" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                    </div>

                                </div>
                                <div class="col-sm-3 start_time_slot ">

                                    <div class="form-group">
                                        @if($key==0) <label style="visibility: hidden">End Time</label>@endif

                                    <select class="start_time validate" required name="start_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['start_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>


                                <div class="col-sm-3 end_time_slot no-padding">

<div class="form-group">
    @if($key==0) <label style="visibility: hidden">End Time</label>@endif
                                    <select class="end_time validate" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                                <div class="col-md-2  @if($key==0)mt-4 @else mt-2 @endif">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                           data-day="wednesday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-availablity="{!! $value['availability_id'] !!}" data-day="wednesday">-</a>

                                    </div>

                                </div>


                            </div>
                        @endforeach

                    @else

                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="wednesday" data-availablity="">

                            <div class="col-sm-4 end_time_slot">
                            <div class="form-group">
<label>Wednesday</label>
                                <select class="end_time validate" required name="location">
                                    <option value="" selected>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                    @endforeach
                                </select>

                            </div>
                            </div>
                            <div class="col-sm-3 start_time_slot ">

                            <div class="form-group">
                                <label style="visibility: hidden">Start Time</label>


                                <select class="start_time validate" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                 </select>
                            </div>
                            </div>
                            <div class="col-sm-3 end_time_slot">

<div class="form-group">
    <label style="visibility: hidden">Start Time</label>
                                <select class="end_time validate" required name="end_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                            <div class="col-md-2 mt-4">
                                <div class="btn-group mr-2">
                                       <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                        data-day="wednesday">+</a>
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-day="wednesday">-</a>

                                </div>

                            </div>
                        </div>

                    @endif

                {{--//////////////////////////////////////////// THURSDAY ///////////////////////////--}}

                    @if(isset($doctor['availability']['thursday']) && !empty($doctor['availability']['thursday']))

                        @foreach( $doctor['availability']['thursday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) thursday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="thursday" data-availablity="{!! $value['availability_id'] !!}">

                                <div class="col-sm-4 end_time_slot thursday">

                                    <div class="form-group">
                                @if($key== 0)<label>Thursday</label>  @endif
                                    <select class="end_time validate" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                </div>

                                </div>
                                <div class="col-sm-3 end_time_slot no-padding">
<div class="form-group">
    @if($key== 0)<label style="visibility: hidden">Start Time</label>@endif

                                    <select class="end_time validate" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                                <div class="col-sm-3 end_time_slot">

                                    <div class="form-group">
                                        @if($key== 0)    <label style="visibility: hidden">Start Time</label>@endif
                                        <select class="end_time validate" required name="end_time">
                                            <option value="">N/A</option>
                                            @foreach($time_slots as $slots)

                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif >{!! $slots !!}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-2  @if($key==0)mt-4 @else mt-2 @endif">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                            data-day="thursday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-availablity="{!! $value['availability_id'] !!}" data-day="thursday">-</a>

                                    </div>

                                </div>


                            </div>
                        @endforeach
                    @else
                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="thursday" data-availablity="">

                            <div class="col-sm-4 end_time_slot  no-padding">

                                <div class="form-group">
                                    <label>Thursday</label>
                                    <select class="end_time validate" required name="location">
                                        <option value="" selected>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                </div>




                            </div>
                            <div class="col-sm-3 start_time_slot ">
                            <div class="form-group">


                                <label style="visibility: hidden">Thursday</label>
                                <select class="start_time validate" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                        <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                            </div>


                            </div>
                            <div class="col-sm-3 end_time_slot no-padding">

<div class="form-group">
    <label style="visibility: hidden">Thursday</label>
    <select class="end_time validate" required name="end_time">
        <option value="">N/A</option>
        @foreach($time_slots as $slots)

            <option value="{!! $slots !!}" >{!! $slots !!}</option>

        @endforeach
    </select>
</div>


                            </div>

                            <div class="col-md-2 mt-4">
                                <div class="btn-group mr-2">
                                         <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                        data-day="thursday">+</a>
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn" data-day="thursday">-</a>

                                </div>

                            </div>
                        </div>
                    @endif


                {{--//////////////////////////////////////////// FRIDAY ///////////////////////////--}}

                    @if(isset($doctor['availability']['friday']) && !empty($doctor['availability']['friday']))


                        @foreach( $doctor['availability']['friday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) friday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="friday" data-availablity="{!! $value['availability_id'] !!}">

                                <div class="col-sm-4 end_time_slot friday">

                                    <div class="form-group">
                                        @if($key==0) <label>Friday</label> @endif


                                    <select class="end_time validate" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                </div>

                                </div>
                                <div class="col-sm-3 start_time_slot ">
                                    <div class="form-group">

                                    <label style="visibility: hidden;">Start Time</label>


                                    <select class="start_time validate" required name="start_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['start_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>

                                </div>
                                <div class="col-sm-3 end_time_slot no-padding">
                                    <div class="form-group">
                                <label style="visibility: hidden">End Time</label>

                                    <select class="end_time validate" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>

                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                            data-day="friday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-availablity="{!! $value['availability_id'] !!}" data-day="friday">-</a>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="friday" data-availablity="">

                            <div class="col-sm-4 end_time_slot">

                                <div class="form-group">
                                <label>Friday</label>

                                <select class="end_time validate form-group" required name="location">
                                    <option value="" selected>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-sm-3 start_time_slot ">
                                <div class="form-group">
                                    <label style="visibility: hidden">Friday</label>



                                <select class="start_time validate form-control" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-sm-3 end_time_slot no-padding">
                                <div class="form-group">
                                    <label style="visibility: hidden">Friday</label>
                                <select class="end_time validate" required name="end_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="col-md-2 mt-4">
                                <div class="btn-group  @if($key==0)mt-4 @else mt-2 @endif">
                                       <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                        data-day="friday">+</a>
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn"    data-day="friday">-</a>

                                </div>

                            </div>
                        </div>
                    @endif

                {{--//////////////////////////////////////////// SATURDAY ///////////////////////////--}}

                    @if(isset($doctor['availability']['saturday']) && !empty($doctor['availability']['saturday']))
                        @foreach( $doctor['availability']['saturday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) saturday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="saturday" data-availablity="{!! $value['availability_id'] !!}">
                                <div class="col-sm-4 end_time_slot saturday">

                                <div class="form-group">
                                    @if($key==0) <label>Saturday</label> @endif

                                    <select class="end_time validate form-control" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>
                                </div>

                                </div>
                                <div class="col-sm-3 start_time_slot ">
                                    <div class="form-group">

                                        @if($key==0)   <label style="visibility: hidden">Start Time</label>@endif



                                        <select class="start_time validate form-control" required name="start_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['start_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        @if($key==0)<label style="visibility: hidden;">Start Time</label>@endif

                                    <select class="end_time validate" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-2  @if($key==0)mt-4 @else mt-2 @endif">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                            data-day="saturday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-availablity="{!! $value['availability_id'] !!}" data-day="saturday">-</a>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="saturday" data-availablity="">

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label>Saturday</label>

                                <select class="end_time validate" required name="location">
                                    <option value="" selected>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                    @endforeach
                                </select>

                            </div>
                            </div>
                            <div class="col-sm-3 ">
                                <div class="form-group">


                                    <label style="visibility: hidden">Saturday</label>
                                <select class="start_time validate" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label style="visibility: hidden">Saturday</label>
                                <select class="end_time validate" required name="end_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <div class="btn-group mr-2">
                                       <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                        data-day="saturday">+</a>
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-day="saturday">-</a>

                                </div>

                            </div>
                        </div>
                    @endif
                {{--//////////////////////////////////////////// SUNDAY ///////////////////////////--}}

                    @if(isset($doctor['availability']['sunday']) && !empty($doctor['availability']['sunday']))
                        @foreach( $doctor['availability']['sunday'] as $key=>$value)
                            <div class="row add-availability  @if($key>0) sunday @endif" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="sunday" data-availablity="{!! $value['availability_id'] !!}">
                                <div class="col-sm-4 end_time_slot sunday">

                               <div class="form-group">

                                   @if($key==0) <label>Sunday</label> @endif
                                    <select class="end_time validate form-control" required name="location">
                                        <option value="" @if(empty($value['location'])) selected @endif>N/A</option>@foreach($locations as $location)

                                            <option value="{!! $location->id !!}" @if(($value['location']==$location->id)) selected @endif >{!! $location->name !!}</option>

                                        @endforeach
                                    </select>

                                </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group">

                                            @if($key==0)<label style="visibility: hidden">Sunday</label>@endif

                                    <select class="start_time validate form-control" required name="start_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['start_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['start_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        @if($key==0)  <label style="visibility: hidden;">Sunday</label>@endif
                                    <select class="end_time validate form-control" required name="end_time">
                                        @foreach($time_slots as $slots)
                                            @if(empty($value['end_time']))
                                                <option value="{!! $slots !!}" >{!! $slots !!}</option>
                                            @else
                                                <option value="{!! $slots !!}" @if(date('H:i',strtotime($value['end_time']))==$slots) selected @endif>{!! $slots !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-2  @if($key==0)mt-4 @else mt-2 @endif">
                                    <div class="btn-group mr-2">
                                        @if($key==0)     <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                            data-day="sunday">+</a>@endif
                                        <a type="button" href="#!" class="btn btn-danger remove-availability-btn"   data-availablity="{!! $value['availability_id'] !!}" data-day="sunday">-</a>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row add-availability" data-doctor="{!! $doctor['doctor_id'] !!}" data-day="sunday" data-availablity="">
                            <div class="col-sm-4">

                            <div class="form-group">
                            <label>Sunday</label>

                                <select class="end_time validate form-control" required name="location">
                                    <option value="" selected>N/A</option>@foreach($locations as $location)

                                        <option value="{!! $location->id !!}" >{!! $location->name !!}</option>

                                    @endforeach
                                </select>
                            </div>

                            </div>
                            <div class="col-sm-3 ">
                                <div class="form-group">
                                <label style="visibility: hidden">Sunday</label>


                                <select class="start_time validate form-control" required name="start_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)
                                       
                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label style="visibility: hidden;">Sunday</label>
                                <select class="end_time validate form-control" required name="end_time">
                                    <option value="">N/A</option>
                                    @foreach($time_slots as $slots)

                                            <option value="{!! $slots !!}" >{!! $slots !!}</option>

                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <div class="btn-group mr-2">
                                      <a type="button" href="#!" class="btn btn-danger add-availability-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                                        data-day="sunday">+</a>
                                    <a type="button" href="#!" class="btn btn-danger remove-availability-btn"    data-day="sunday">-</a>

                                </div>

                            </div>
                        </div>
                    @endif

            </div>
                @endforeach
        </div>
    </div>
    <div class="col-md-4">
        <div class="card holidays">

            <div class="card-body">
                <div class="row"> <h4 class="heading left">Holidays And Unavailable Times</h4>
                    <a href="javascript:;" class="right m-top-10"> <span
                                class="badge  light-blue darken-4 white-text add-holiday-btn" data-doctor-id="{!! $doctor['doctor_id'] !!}"
                                availability_id=""
                                data-day="monday">+</span> </a></div>


                <div class="row holidays-clone" style="display: none">
                    <div class="col-sm-6 input-field ">
                        
                        <input id="from_date{!! $doctor['doctor_id'] !!}" name="from_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">

                    </div>
                    <div class="col-sm-6 input-field  ">
                        
                        <input id="to_date{!! $doctor['doctor_id'] !!}" name="to_date" type="text" value="{{ date('d.m.Y') }}"  class="datepicker">

                    </div>
                    <div class="col s2  no-padding">
                        <a href="javascript:;" class="right m-top-10 remove-holiday-btn" availability_id=""> <span
                                    class="badge orange darken-4 white-text "

                            >-</span> </a>
                    </div>
                </div>

                <div class="show-holiday">
                    @if(isset($doctor['availability']['holiday']) && !empty($doctor['availability']['holiday']))
                        @foreach($doctor['availability']['holiday'] as $value)
                            <div class="row"  availability_id="{!! $value['availability_id'] !!}">
                                <div class="col-sm-6 input-field ">
                                    
                                    <input id="from_date{!! $value['availability_id'] !!}" name="from_date" type="text" value="{{ date('d.m.Y', strtotime($value['start_date'])) }}"  class="datepicker form-control">

                                </div>
                                <div class="col-sm-6 input-field  ">
                                    
                                    <input id="to_date{!! $value['availability_id'] !!}" name="to_date" type="text" value="{{  date('d.m.Y', strtotime($value['end_date'])) }}"  class="datepicker form-control">

                                </div>
                                <div class="col s2  no-padding">
                                    <a href="javascript:;" class="right m-top-10 remove-holiday-btn" availability_id="{!! $value['availability_id'] !!}"> <span
                                                class="badge orange darken-4 white-text"

                                        >-</span> </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function(){
        /*$("select[name=location]").select2({
            dropdownAutoWidth : 'true',
            width: 'auto'
        });*/

      /*  $(".datepicker").focusout(function(){
            // alert($(this).val());
            $(this).datepicker("setDate",new Date($(this).val()));
        });*/
        $("select[name=start_time]").select2({
            dropdownAutoWidth : 'true',

        }).change(function(){
            var start_time = $(this).val();
            var ths = $(this);
            $.ajax({
                url: '/calculate/time',
                data: {start_time: start_time, "_token": "{!! csrf_token() !!}"},
                type: "post",
                success: function (response) {
                    ths.parents('.add-availability').find("select[name=end_time]").select2('destroy');
                    ths.parents('.add-availability').find('select[name=end_time]').html('');

                    response = $.parseJSON(response);


                    var str = "";
                    $.each(response, function (i, v) {
                        str += '<option value="' + v.value + '">' + v.text + '</option>'
                    });

                    ths.parents('.add-availability').find('select[name=end_time]').html(str);
                    ths.parents('.add-availability').find("select[name=end_time]").select2({
                        dropdownAutoWidth : 'true',

                    }).change(function(){
                        var ths = $(this);
                        var end_time = $(this).val();

                        var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                        var day = ths.parents('.add-availability').attr('data-day');
                        var id = ths.parents('.add-availability').attr('data-availablity');
                        var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
                        var location = ths.parents('.add-availability').find('select[name=location]').val();
                      //  alert(location);
                        //  alert(end_time);
                        //alert(day);
                        
                        $(".ajax-loading").show();
                        $.ajax({
                            url:"/save/availabilty",
                            data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                            type:"POST",
                            success:function(response){
                                ths.parents('.add-availability').attr('data-availablity',response);
                                $(".ajax-loading").hide();
                            }
                        });
                    });
                    /*$(".input_end_time li").click(function () {
                        var end_time = $(this).attr('value');
                        // alert(end_time);
                        $(this).parents('.input-field').find('input').val(end_time);
                        var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                        var day = ths.parents('.add-availability').attr('data-day');
                        var id = ths.parents('.add-availability').attr('data-availablity');
                        //alert(day);
                        $(".ajax-loading").show();
                        $.ajax({
                            url:"/save/availabilty",
                            data:{start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                            type:"POST",
                            success:function(response){
                                $(".ajax-loading").hide();
                                if(id=="")
                                    ths.parents('.add-availability').attr('data-availablity',response);
                            }
                        });

                    });*/
                }
            });
        });
        $("select[name=end_time]").select2({
            dropdownAutoWidth : 'true',

        }).change(function(){
            var ths = $(this);
            var end_time = $(this).val();

            var doctor_id = ths.parents('.add-availability').attr('data-doctor');
            var day = ths.parents('.add-availability').attr('data-day');
            var id = ths.parents('.add-availability').attr('data-availablity');
            if(!id || id=="") return false;
            var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
            var location = ths.parents('.add-availability').find('select[name=location]').val();
            //  alert(end_time);
            //alert(day);
            $(".ajax-loading").show();
            $.ajax({
                url:"/save/availabilty",
                data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                type:"POST",
                success:function(response){
                    ths.parents('.add-availability').attr('data-availablity',response);
                    $(".ajax-loading").hide();
                }
            });
        });;
        $("select[name=location]").select2({
            dropdownAutoWidth : 'true',

        }).change(function(){
            var ths = $(this);
            var location = $(this).val();

            var doctor_id = ths.parents('.add-availability').attr('data-doctor');
            var day = ths.parents('.add-availability').attr('data-day');
            var id = ths.parents('.add-availability').attr('data-availablity');
            if(!id || id=="") return false;
            var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
            var end_time = ths.parents('.add-availability').find('select[name=end_time]').val();
            //  alert(end_time);
            //alert(day);
            $(".ajax-loading").show();
            $.ajax({
                url:"/save/availabilty",
                data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                type:"POST",
                success:function(response){
                    ths.parents('.add-availability').attr('data-availablity',response);
                    $(".ajax-loading").hide();
                }
            });
        });;
        $(".remove-holiday-btn").click(function(){
            var availability_id = $(this).attr('availability_id');
            var ths = $(this);


            $.ajax({
                url:'/holidays/delete/'+availability_id,
                success:function(){
                    ths.parent().parent().remove();
                }
            });
        });
        $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy',
            onSelect: function(dateText, inst) {
                // var from_date = $(this).val();
               //  alert()
                var input_target = inst.input[0].name;

                var from_date = $(this).parent().parent().find('input[name=from_date]').val();
                var end_date = $(this).parent().parent().find('input[name=to_date]').val();
                var availability_id = $(this).parent().parent().attr('availability_id');
                var d = from_date.split('.');

                var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                d = end_date.split('.');
                var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);
               // alert(f+":"+":"+from_date+":"+e+":"+end_date);
                if(f > e){
                    $(this).parent().parent().find('input[name=to_date]').val(from_date);
                    return false;
                }

//alert(availability_id); return false;
                if(end_date!=""){
                    $(".ajax-loading").show();
                    $.ajax({
                        url:"/save/holidays",
                        type:"POST",
                        data:{from_date:from_date,end_date:end_date,"_token": "{!! csrf_token() !!}",id:availability_id},
                        success:function(response){

                            $(".ajax-loading").hide();
                        }
                    });
                }
            }});
        var to_animate = 0;
        $(".remove-availability-btn").click(function(){
            var availability_id = $(this).attr('data-availablity');
            var day = $(this).attr('data-day');
            if( $(this).parents('.add-availability').hasClass(day))
            {
                $(this).parents('.add-availability').remove();
            }else{
                $(this).parents('.add-availability').find('input').val('');
            }
            $(".ajax-loading").show();
            $.ajax({
                url:"/availability/delete/"+availability_id,
                success:function(){
                    $(".ajax-loading").hide();
                }
            });
        });

        $(".add-holiday-btn").click(function(){
            var random_number = Math.floor((Math.random() * 1000) + 1);
            var clone = $(this).parents('.holidays').find(".holidays-clone").clone().removeAttr('style');;
            var doctor_id = $(this).attr('data-doctor-id');


            clone =  clone.removeClass('holidays-clone');
            clone.find('input[name=from_date]').attr('id','from_date'+random_number);
            clone.find('input[name=to_date]').attr('id','to_date'+random_number);
            //console.log(clone);
            //clone = clone.find('input[name=from_date]').attr('id','from_date'+random_number);
            $(this).parent().parent().parent().find(".show-holiday").append(clone);
            //$(".show-holiday").find('.hasDatepicker').attr('id',);
            $(this).parent().parent().parent().find(".show-holiday").find('.hasDatepicker').removeClass('hasDatepicker').addClass('form-control');

            $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy',
                onSelect: function(dateText, inst) {
                    // var from_date = $(this).val();

                    var input_target = inst.input[0].name;

                    var from_date = $(this).parent().parent().find('input[name=from_date]').val();
                    //   alert(from_date);
                    var end_date = $(this).parent().parent().find('input[name=to_date]').val();
                    var availability_id = $(this).parent().parent().attr('availability_id');
                    var ths =  $(this).parent().parent();
                    var d = from_date.split('.');

                    var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                    d = end_date.split('.');
                    var e = new Date(d[2]+"-"+d[1]+"-"+d[0]);
                    // alert(f+":"+":"+from_date+":"+e+":"+end_date);
                    if(f > e){
                        $(this).parent().parent().find('input[name=to_date]').val(from_date);
                        return false;
                    }

//alert(availability_id); return false;
                    if(end_date!=""){
                        $(".ajax-loading").show();
                        //return false;
                        $.ajax({
                            url:"/save/holidays",
                            type:"POST",
                            data:{from_date:from_date,end_date:end_date,doctor_id:doctor_id,"_token": "{!! csrf_token() !!}",id:availability_id},
                            success:function(response){
                                  console.log(ths.parent().parent());
                                //  ths.remove();
                                ths.find('.remove-holiday-btn').attr('availability_id', response);
                                ths.attr('availability_id', response);
                                //  ths.find('.remove-holiday-btn').remove();
                                $(".ajax-loading").hide();
                                $(".remove-holiday-btn").click(function(){
                                    var availability_id = $(this).attr('availability_id');
                                    var ths = $(this);


                                    $.ajax({
                                        url:'/holidays/delete/'+availability_id,
                                        success:function(){
                                            ths.parent().parent().remove();
                                        }
                                    });
                                });
                            }
                        });
                    }
                }});
            $(".remove-holiday-btn").click(function(){
                $(this).parent().parent().remove();
            });
        });

        $(".add-availability-btn").on('click', function () {
           // alert();
            var day = $(this).attr('data-day');
            var random_number = Math.floor((Math.random() * 1000) + 1);
            //alert(random_number);
            $(this).parents('.add-availability').find('select[name=start_time]').select2('destroy');
            $(this).parents('.add-availability').find('select[name=end_time]').select2('destroy');
            $(this).parents('.add-availability').find('select[name=location]').select2('destroy');
            // alert('d');
            var clone = $(this).parents('.add-availability').clone().addClass(day).addClass('new');
            $(this).parents('.add-availability').find('select[name=start_time]').select2();
            $(this).parents('.add-availability').find('select[name=end_time]').select2();
            $(this).parents('.add-availability').find('select[name=location]').select2();
            //console.log($(this).parents('.add-availability').html()); return false;
           // console.log(clone.toString());return false;

            $(this).parents('.add-availability').after(clone);
            //return false;
            $('.add-availability.'+day).find('label').hide('');





            // $(this).parents('.add-availability').not(":first-child").find('.' + day).parents('.add-availability').addClass(day);
            $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').attr('data-availablity','');



            $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').find('.add-availability-btn').remove();
            $('.add-availability.new.'+day).not(":first-child").find('.' + day).parents('.add-availability').find('.mt-4').removeClass('mt-4').addClass('mt-2');

            $('.add-availability.new.'+day).find('select[name=start_time]').attr('id',"start_time"+random_number);
            $('.add-availability.'+day).find('select[name=start_time]').attr('data-activates',day+"_input_start_time"+random_number);

            $('.add-availability.new.'+day).find('select[name=end_time]').attr('id',"end_time"+random_number);
            $('.add-availability.'+day).find('select[name=end_time]').attr('data-activates',day+"_input_end_time"+random_number);

            $('.add-availability.new.'+day).find('.input_start_time').attr('id',day+"_input_start_time"+random_number);
            $('.add-availability.new.'+day).find('.input_end_time').attr('id',day+"_input_end_time"+random_number);
          //  return false;

           $('.add-availability.new.'+day).find('select[name=start_time]').select2({
               dropdownAutoWidth : 'true',

           }).change(function(){
               var start_time = $(this).val();
               var ths = $(this);
               $.ajax({
                   url: '/calculate/time',
                   data: {start_time: start_time, "_token": "{!! csrf_token() !!}"},
                   type: "post",
                   success: function (response) {
                       ths.parents('.add-availability').find("select[name=end_time]").select2('destroy');
                       ths.parents('.add-availability').find('select[name=end_time]').html('');

                       response = $.parseJSON(response);


                       var str = "";
                       $.each(response, function (i, v) {
                           str += '<option value="' + v.value + '">' + v.text + '</option>'
                       });

                       ths.parents('.add-availability').find('select[name=end_time]').html(str);
                       ths.parents('.add-availability').find("select[name=end_time]").select2({
                           dropdownAutoWidth : 'true',

                       }).change(function(){
                           var ths = $(this);
                           var end_time = $(this).val();

                           var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                           var day = ths.parents('.add-availability').attr('data-day');
                           var id = ths.parents('.add-availability').attr('data-availablity');
                          // alert(id);
                           var start_time = ths.parents('.add-availability').find('select[name=start_time]').val();
                           var location = ths.parents('.add-availability').find('select[name=location]').val();
                           //  alert(end_time);
                           //alert(day);
                           $(".ajax-loading").show();
                           $.ajax({
                               url:"/save/availabilty",
                               data:{location:location,start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                               type:"POST",
                               success:function(response){
                                   ths.parents('.add-availability').attr('data-availablity',response);
                                   $(".ajax-loading").hide();
                               }
                           });
                       });
                       /*$(".input_end_time li").click(function () {
                        var end_time = $(this).attr('value');
                        // alert(end_time);
                        $(this).parents('.input-field').find('input').val(end_time);
                        var doctor_id = ths.parents('.add-availability').attr('data-doctor');
                        var day = ths.parents('.add-availability').attr('data-day');
                        var id = ths.parents('.add-availability').attr('data-availablity');
                        //alert(day);
                        $(".ajax-loading").show();
                        $.ajax({
                        url:"/save/availabilty",
                        data:{start_time:start_time,end_time:end_time,id:id,"_token": "{!! csrf_token() !!}",day:day,doctor_id:doctor_id},
                        type:"POST",
                        success:function(response){
                        $(".ajax-loading").hide();
                        if(id=="")
                        ths.parents('.add-availability').attr('data-availablity',response);
                        }
                        });

                        });*/
                   }
               });
           });;

           $('.add-availability.new.'+day).find('select[name=end_time]').select2({
               dropdownAutoWidth : 'true',

           });
            $('.add-availability.new.'+day).find('select[name=location]').select2({
                dropdownAutoWidth : 'true',

            });
            $('.add-availability.new.'+day).removeClass('new');

            /*$("input[name=start_time]").click(function () {
             var ths = $(this);
             if (to_animate == 0)
             to_animate = (ths.parent().find('li.selected').offset().top);
             ths.parent().find('.dropdown-content').animate({scrollTop: to_animate - 300});
             });*/
            /* $(".add-availability-btn").click(function(){
             // alert('d');
             $(this).parents('.add-availability').after($(this).parents('.add-availability').clone());
             });*/


            $(".remove-availability-btn").click(function(){
                var availability_id = $(this).attr('data-availablity');
                var day = $(this).attr('data-day');
                if( $(this).parents('.add-availability').hasClass(day))
                {
                    $(this).parents('.add-availability').remove();
                }else{
                    $(this).parents('.add-availability').find('input').val('');
                }


            });


        });


    })
</script>