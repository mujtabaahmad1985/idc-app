<style>
    a.delete-media{ padding-left: 5px;}
    a.delete-media i,a.download-media i{ position: relative;
        top:7px;}
</style>
<div class="row">
    <div class="col-sm-10 no-padding">
        <a class="waves-effect waves-light btn red add-upload-media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient_id !!}"><i class="icon-file-upload2s"></i> Upload Media</a>
    </div>
    <div class="col-sm-2 text-right">
        <a href="#!" class="text-danger change-layout mr-1" data-action="grid"  data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient_id !!}"><i class="icon-grid"></i></a>
        <a href="#!" class="text-danger change-layout" data-action="list"  data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient_id !!}"><i class="icon-list2"></i></a>
    </div>
    <div class="clear"></div>
    <hr />
</div>
<div class="row">
    <div class="col-sm-12 layout-output">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>File Name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Uploaded DateTime</th>
                <th></th>
            </tr>

            </thead>
            <tbody>
              @if(!is_null($media))
                  @foreach($media as $m)


                  <tr>
                      <td><span style="text-transform: lowercase">{!! $m->media_file_name !!}</span> </td>
                      <td><span style="text-transform: lowercase">{!! $m->media_file_type !!}</span></td>
                      <td></td>
                      <td>{!! date('m.d.Y H:i:s', strtotime($m->created_at)) !!}</td>
                      <td><a href="/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" download="{!! $m->media_file_name !!}" data-id="{!! $m->id !!}" class="download-media"><i class="icon-file-download text-danger"></i> </a>  <a href="#!" data-id="{!! $m->id !!}" class="delete-media"><i class="icon-trash text-danger"></i> </a> </td>

                  </tr>
                  @endforeach
                  <td colspan="5">
                      {{ $media->links() }}
                  </td>
                  @else
                  <tr>
                      <td colspan="5">No media found</td>

                  </tr>

            @endif
            </tbody>
        </table>
    </div>
</div>



<script>
    var flag_upload_media = false;
    $(function(){

        $(".change-layout").click(function () {
            var action = $(this).attr('data-action');
            var data = {
                patient_id:$(this).attr('data-patient-id'),
                appointment_id:$(this).attr('data-appointment-id'),
                treatment_id:$(this).attr('data-treatment-id')
            };
           // $("#get-media").modal('open');
            var url ="";

            if(action=="list")
                url = '/get/media/list';
            else
                url = '/get/media/grid';

            $.ajax({
                url:url,
                data:{"_token":"{!! csrf_token() !!}",data:data},
                type:"post",
                success:function (response) {
                    $(".layout-output").html(response);





                }
            });
        });

        $(".add-upload-media").click(function(){
            flag_file_media = false;
            var data = {
                patient_id:$(this).attr('data-patient-id'),
                appointment_id:$(this).attr('data-appointment-id'),
                treatment_id:$(this).attr('data-treatment-id')
            };
            $("#add-media").modal();
            $.ajax({
                url:'/add/media',
                data:{"_token":"{!! csrf_token() !!}"},
                type:"post",
                success:function (response) {
                    $(".close-media").attr('data-patient-id',data.patient_id);
                    $(".close-media").attr('data-appointment-id',data.appointment_id);
                    $(".show-media").html(response);
                    $("#my-awesome-dropzone").dropzone({ url: "/upload/media",
                        maxFilesize: 3,
                        acceptedFiles: "",
                        sending:function(file, xhr, formData){
                            flag_file_media = true;
                            formData.append('_token','{!! csrf_token() !!}' );
                            formData.append('patient_id',data.patient_id );
                            formData.append('appointment_id',data.appointment_id );
                            formData.append('treatment_id',data.treatment_id );

                        },});
                }
            });

        });

        $(".close-media").click(function () {
            if(flag_upload_media){
                var data = {
                    patient_id:$(this).attr('data-patient-id'),
                    appointment_id:$(this).attr('data-appointment-id'),
                    treatment_id:$(this).attr('data-treatment-id')
                };

                $.ajax({
                    url:'/get/media/list',
                    data:{"_token":"{!! csrf_token() !!}",data:data},
                    type:"post",
                    success:function (response) {
                        $(".get-media-show").html(response);

                    }
                });
            }
        });

        $(".delete-media").click(function(){
            var id = $(this).attr('data-id');
            var ths = $(this);

            $.ajax({
                url:"/media/delete/"+id,
                success:function () {
                    ths.parents('tr').remove();
                }
            });
        });
    })
</script>