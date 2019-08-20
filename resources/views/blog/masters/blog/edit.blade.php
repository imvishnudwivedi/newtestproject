@extends('blog.layouts.dashboard')

@section('title', 'Sub Category')

@section('page_title', 'Sub Category ')


@section('page_title_sub', 'Manage Sub Category')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Sub Category here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">

         {!!Form::model($blog,array('route' => array('blog.masters.blog.update', $blog->id), 'method' => 'PUT','files'=>true,'id'=>'edit-form','onSubmit'=>'return validate()'))!!}
          {!!Form::hidden('id',$blog->id)!!}

        <input type="hidden" id="public_path" name="public_path" value="{{public_path()}}">
        <input type="hidden" id="temp_file_path" name="temp_file_path">





<div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Name *')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Sub Category ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>







<div class="col-md-4">
     <div class="form-group @if($errors->first('category_id')) has-error @endif">
         {!!Form::label('category_id','Category*')!!}<br>
         {!!Form::select('category_id',array(),null,['class' => 'form-control required','id'=>'category_id','name'=>'category_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('category_id') }}</small>
      </div>
</div>










<div class="col-md-4">
  <div class="form-group @if($errors->first('description')) has-error @endif">
   {!!Form::label('description','Description')!!}
   {!!Form::textarea('description',Input::old('description'),['class' => 'form-control','id'=>'description',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Description","data-placement"=>"bottom",'rows'=>'3'])!!}
   <small class="text-danger">{{ $errors->first('description') }}</small>
 </div>
</div>





<div class="clearfix"></div>

<!-- Attach Image field -->
<div class="col-md-4" id="attachment_div">
  {!! Form::label('Attach Image') !!}
  <input type="file" class="form-control" id="file_name" name="file_name">
</div>



<div class="col-md-2" style="margin-top:25px;">
  {!! Form::button('Upload Image', ['class' => 'btn btn-block btn-success btn-block', 'id' => 'upload_btn']) !!}
</div>
<div class="clearfix"></div>

<div class="col-md-12" style="margin-top: 10px;">
         <div class="col-md-8" id="details_div">
           @if($sub_category->image)
           <?php $attachment_path = getSubCategoryUploadedPath($sub_category->image)?>
           <img src="{{$attachment_path}}" id="disp_round_attachment" height="200px" width="200px" >
           @endif
         </div>
       </div>


<div class="clearfix"></div>
</div>

<div class='clearfix'></div>
<div class="col-md-2 pull-right">
  <a href="{{URL::route('blog.masters.sub_category.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-block btn-success btn-block']) !!}
  </div>
</div>

          <div class="clearfix"></div>
          {!!Form::close()!!}
        </div>

      </div><!-- /.box -->
    </div><!-- /.col -->

  </div>
</div><!-- /.row -->
@endsection
@section('script')
@parent
<script type="text/javascript">

var sub_category = <?php echo json_encode($sub_category) ?>;

var category = <?php echo json_encode($category) ?>;


var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<category.length;i++){
    dis1+='<option value='+category[i]['id']+'>'+category[i]['name']+'</option>';
  }
  $('#category_id').html(dis1);
  $('#category_id').val(sub_category['category_id']);




 $(function(){


 $('[data-toggle="popover"]').popover();

})



   //image upload
$('#upload_btn').click(function(){
console.log(11111111);
  var formData = new FormData($('#edit-form')[0]);

  var ajax = $.ajax({
    type: 'post',
    url:'{{URL::route("blog.masters.sub_category.uploadSubCategoryImage")}}',

    data: formData,
    contentType: false,
    processData: false
  }).done(function(result) {
        console.log(result);
        if(result){

          console.log($('#public_path').val());
          var public_path=$('#public_path').val();

          var path=public_path+result['path'];
          console.log("path");
          console.log(path);
          $('#temp_file_path').val(path);
          $('#disp_round_attachment').attr('src',result['path']);

           $('#details_div').show();
         }else{
          $.notify(" Please Choose file.",{
            type:'danger',
          });
          return false;
        }
      })
  .fail(function() {
    alert("fail");
  });

});

function validate()
  {
    var flag=1;
    if($('#edit-form').valid()){

  if($('#hsn_code').val()==0){
        $.notify("Please select HSN Code!",{
          type:'danger',
        });
         return false;
      }


  if($('#country_id').val()==0){
        $.notify("Please select Country!",{
          type:'danger',
        });
         return false;
      }


  if($('#state_id').val()==0){
        $.notify("Please select state!",{
          type:'danger',
        });
         return false;
      }

      $('#save_btn').attr('disabled',true);

      return true;
    }else{
      return false;
    }
  }




</script>
@stop
