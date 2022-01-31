<style>
    .highlight th{ line-height: 30px}
</style>
@if(!is_null($consent))
<table class="highlight">

    <tbody>
       <tr>
           <th width="30%">Patient Name:</th>
           <td>{!! $patient->patient_name !!}</td>
       </tr>
       <tr>
           <th>Doctor Name:</th>
           <td>{!! ucwords($doctor->fname.' '.$doctor->lname) !!}</td>
       </tr>
       <tr>
           <th>Patient Phone:</th>
           <td>{!! $patient->patient_phone !!}</td>
       </tr>
       <tr>
           <th>Family Member's Name:</th>
           <td>{!! $consent->patient_family_name !!}</td>
       </tr>
       <tr>
           <th>Family Member's Contact:</th>
           <td>{!! $consent->family_contact !!}</td>
       </tr>
       <tr>
           <th>Notes:</th>
           <td>{!! $consent->notes !!}</td>
       </tr>
       <tr>
           <th>Date Time:</th>
           <td>{!! date('d.m.Y H:i:s',strtotime($consent->created_at)) !!}</td>
       </tr>
    </tbody>

</table>
    @else
    <div class="col s12 m12">
        <div class="card-panel red"> <span class="white-text">No info found!</span>
        </div>
    </div>
 @endif