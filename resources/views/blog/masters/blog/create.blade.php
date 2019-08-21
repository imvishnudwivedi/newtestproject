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





<div class="col-md-4">
     

<div class="form-group @if($errors->first('language_id')) has-error @endif">
         {!!Form::label('language_id','Language *')!!}<br>
         {!!Form::select('language_id',$languages,null,['class' => 'form-control required','id'=>'language_id','name'=>'language_id','notequal'=>'0','data-live-search'=>'true']) !!}
         <small class="text-danger">{{ $errors->first('language_id') }}</small>
      </div>
</div> 


<!-- <div class="col-md-4">
  <div class="form-group @if($errors->first('language_id')) has-error @endif">
      {!!Form::label('language_id','Language *')!!}<br>
      {!!Form::select('language_id',array(),null,['class' => 'form-control ','id'=>'language_id','name'=>'language_id[]','notequal'=>'0','data-live-search'=>'true']) !!}
      <small class="text-danger">{{ $errors->first('language_id') }}</small>
   </div>
</div> -->




<!-- 

<div class="col-md-4" id="language_ids_div">
     <div class="form-group @if($errors->first('language_id')) has-error @endif">
         {!!Form::label('language_id','Industry*')!!}<br>
         {!!Form::select('language_id[]',array(),null,['class' => 'form-control ','id'=>'language_id','name'=>'language_id[]','notequal'=>'0','data-live-search'=>'true','multiple']) !!}
         <small class="text-danger">{{ $errors->first('language_id') }}</small>
      </div>
</div>
 -->
 <!-- <div class="col-md-4">
  <div class="form-group @if($errors->first('language_id')) has-error @endif">
      {!!Form::label('language_id','Language *')!!}<br>
      {!!Form::select('language_id',$languages,null,['class' => 'form-control required','id'=>'language_id','name'=>'language_id','notequal'=>'0','data-live-search'=>'true']) !!}
      <small class="text-danger">{{ $errors->first('language_id') }}</small>
   </div>
</div> -->

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
