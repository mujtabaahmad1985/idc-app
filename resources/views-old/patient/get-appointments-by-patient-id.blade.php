<table>
    <thead>
     <tr>
         <th>Patient Visit Name</th>
         <th>Start</th>
         <th>Visit Status</th>
         <th>Actions</th>
     </tr>
    </thead>
@if($appointments && !is_null($appointments))

    @foreach($appointments as $appointment)
        <tr>
            <td style="padding-top: 9px;"><a href="#!">{!! $appointment->service_name !!}</a> with <a href="#!">#Dr. {{ $appointment->fname.' '.$appointment->lname }}</a> </td>
            <td style="padding-top: 9px;">{{ date('H:i A', strtotime($appointment->start_time)) }} -   {{ date('H:i A', strtotime($appointment->end_time)) }} {{ date('l d.m.Y', strtotime($appointment->booking_date)) }}</td>
            <td style="padding-top: 9px;">{!! $appointment->status !!}</td>
            <td style="padding-top: 9px;"> <a href="#!" class="delete"  data-appointment-id="{!! $appointment->appointment_id !!}">Delete</a> </td>
        </tr>
        @endforeach
    @endif
</table>

<script>
    
    $(function () {
       $(".edit").click(function(){
           var id = $(this).attr('data-appointment-id');

           $("#edit-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');

           $("#appointment-edit-detail").modal('open');
           var id = $(this).attr('data-appointment-id');
           var name = $(this).attr('data-patient-name');
           $.ajax({
               url:"/appointment/edit/"+id,
               success:function(response){
                   $("#edit-appointment").html(response);
                   $("#edit-patient-name").html("Edit Appointment for "+ name);
               }
           });
       });

       $(".delete").click(function () {
           var ths = $(this);
           var appointment_id = $(this).attr('data-appointment-id');
           swal({    title: "Are you sure?",
                   text: "You will not be able to recover this appointment!",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: true },
               function(){

                   $.ajax({
                       url:"/appointment/delete/"+appointment_id,
                       success:function(response){
                           response  =$.parseJSON(response);
                           $("#appointment-show-detail").modal('close');
                           swal("Deleted!", "Appointment has been deleted.", "success");
                           ths.parents('tr').remove();
                       }
                   });



               });
       });
    })
    
</script>