@extends('blog.layouts.dashboard')

@section('title', 'Blog')

@section('page_title_sub', 'Add Blog')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Blog here</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="clearfix"></div>
        <div class="col-md-12">
          {!!Form::open(array('route' => array('blog.masters.blog.store'), 'method' => 'POST','files'=>true,'id'=>'add-form','onsubmit'=>'return validate()'))!!}






          <div class="col-md-4">
  <div class="form-group @if($errors->first('name')) has-error @endif">
   {!!Form::label('name','Name *')!!}
   {!!Form::text('name',Input::old('name'),['class' => 'form-control required','id'=>'name',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Blog ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('name') }}</small>
 </div>
</div>




{{-- 
<div class="col-md-4">
     <div class="form-group @if($errors->first('language_id')) has-error @endif">
         {!!Form::label('language_id','Language *')!!}<br>
         {!!Form::select('language_id',$languages,null,['class' => 'form-control required','id'=>'language_id','name'=>'language_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('language_id') }}</small>
      </div>
</div> --}}


<div class="col-md-4">
     <div class="form-group @if($errors->first('language_id')) has-error @endif">
         {!!Form::label('language_id','Language *')!!}<br>
         {!!Form::select('language_id[]',array(),null,['class' => 'form-control ','id'=>'language_id','name'=>'language_id[]','notequal'=>'0','data-live-search'=>'true','multiple']) !!}
         <small class="text-danger">{{ $errors->first('language_id') }}</small>
      </div>
</div>



<!-- 

<div class="col-md-4" id="language_ids_div">
     <div class="form-group @if($errors->first('language_id')) has-error @endif">
         {!!Form::label('language_id','Industry*')!!}<br>
         {!!Form::select('language_id[]',array(),null,['class' => 'form-control ','id'=>'language_id','name'=>'language_id[]','notequal'=>'0','data-live-search'=>'true','multiple']) !!}
         <small class="text-danger">{{ $errors->first('language_id') }}</small>
      </div>
</div>
 -->


<div class="col-md-4">
  <div class="form-group @if($errors->first('doj')) has-error @endif">
   {!!Form::label('doj','Date of Joining *')!!}
   {!!Form::input('date','doj',Input::old('doj'),['class' => 'form-control required datepicker','id'=>'doj',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Blog ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('doj') }}</small>
 </div>
</div>


<div class="col-md-4">
  <div class="form-group @if($errors->first('dob')) has-error @endif">
   {!!Form::label('dob','Date of Birth *')!!}
   {!!Form::input('date','dob',Input::old('dob'),['class' => 'form-control required','id'=>'dob',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Blog ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('dob') }}</small>
 </div>
</div>



<div class="col-md-4">
  <div class="form-group @if($errors->first('phone_number')) has-error @endif">
   {!!Form::label('phone_number','Phone Number *')!!}
   {!!Form::input('number','phone_number',Input::old('phone_number'),['class' => 'form-control required','id'=>'phone_number',"data-toggle"=>"popover","data-trigger"=>"focus","title"=>"","data-content"=>"Enter Blog ","data-placement"=>"bottom",])!!}
   <small class="text-danger">{{ $errors->first('phone_number') }}</small>
 </div>
</div>






<div class="col-md-2 pull-right">
  <a href="{{URL::route('blog.masters.blog.index')}}">{!! Form::button('Cancel', ['class' => 'btn btn-block btn-danger btn-block','id'=>'clr-btn']) !!}</a>
</div>
<div class="col-md-2 pull-right">
  <div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-block btn-success btn-block','id'=>'save_btn']) !!}
  </div>
</div>


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

var languages=<?php echo json_encode($languages) ?>;


var token=$('#token').val();

  var dis1='<option value="0">Select Option...</option>';
  for(var i=0;i<languages.length;i++){
    dis1+='<option value='+languages[i]['id']+'>'+languages[i]['name']+'</option>';
  }
  console.log(dis1);
  $('#language_id').html(dis1).selectpicker();




  $('#language_id').change(function(){

// $('#sub_category_id').html('');
// $('#sub_category_div').html('<label>Select Option *</label><select class="form-control" id="sub_category_id" name="sub_category_id" data-live-search="true"></select>');

var language_id=$('#language_id').val();

 $.ajax({
  type: 'get',
  url:'{{URL::route("getBlog")}}',
  dataType: 'json',
  data:{language_id:language_id},
  async:false
}).done(function(result1) {
 console.log(result1);

  result=result1['sub_category_details'];
    var dis_su='<option value=0>Select Sub Category</option>';
    for(i=0;i<result.length;i++){
     dis_su+='<option value='+result[i]['id']+'>'+result[i]['name']+'</option>';
   }
   $('#language_id').html(dis_su);
});

});







function validate()
  {
    var flag=1;
    if($('#add-form').valid()){

      if($('#language_id').val()==0){
        $.notify("Please select Language",{
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
public function getBlog(Request $request) {
		// dd($request->all());
        $blog = DB::table('blog as b')
        ->join('language AS l', 'l.id', '=', 'b.language_id')

		   ->select('b.*', 'l.name as language_name')
			->where('b.language_id', $request->language_id)
			->get();

		// dd($blog);

		return response()->json(array('blog' => $blog));
	}


    Route::get('getBlog', ['as' => 'getBlog', 'uses' => 'BlogController@getBlog']);