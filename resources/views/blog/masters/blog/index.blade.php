@extends('blog.layouts.dashboard')

@section('title', 'Add Blog')

@section('page_title', 'Add Blog')

@section('content')

<div class='row' style="padding:2px;">

 <div class="box box-primary">
      <div class="box-header with-border">
       <div class="box-body table-responsive no-padding">


        <div class="clearfix"></div>

       <div class="box-header with-border">
        <h3 class="box-title">List of Add Blog</h3>
      </div>
        <div class="col-md-12">
          <div class="pull-right">

            <a href="{{route('blog.masters.blog.create')}}" class="btn bg-green margin" data-toggle="tooltip" data-placement="bottom" title="Click here to add" id="add_asset">
             <i class="glyphicon glyphicon-pencil"></i> Add
           </a>






        </div><div class="clearfix"></div>


        <table class="table table-bordered" id="view">
          <thead>
            <tr class="bg-blue">

              <th>Name</th>
              <th>Language</th>
              <th>Date Of Birth</th>
              <th>Date Of Joining</th>
              <th>Phone Number</th>
              <th>Status</th>
              <th width="10%">Action</th>

            </tr>


        </thead>
          <tbody id="row">
          @foreach($blog as $b)
       
            <tr style="page-break-inside: avoid;" tabindex="-1" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" data-content="Created by: {{$b->created_by}}<br> Created at: {{getFormatedDate($b->created_at)}} <br> Updated by:{{$b->updated_by}} <br> Updated at:{{getFormatedDate($b->updated_at)}}">

            <td>{{$b->name}}</td>

              <td>{{$b->language_name}}</td>
                 <td>{{$b->dob}}</td>
                 <td>{{$b->doj}}</td>
                 <td>{{$b->phone_number}}</td>

              @if($b->deleted_at==null)
              <td><i class="fa fa-check text-green"></i></td>
              @else
              <td><i class="fa fa-times-circle-o text-red"></i></td>
              @endif

                <td>
                <a href="{{URL::to('/')}}/blog/masters/blog/{{$b->id}}/edit" class="td-action-btn point-this" data-toggle="tooltip" data-placement="top" title="Edit">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>

            
              </td>

            </tr>
            @endforeach
          
          </tbody>
          <div class="clearfix"></div>

        </table>


        <div class="clearfix"></div>


      </div>

    </div>
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->

@endsection

@section('script')
@parent

<script type="text/javascript">



 $(function(){
  $('.filter').multifilter({'target':$('#view')});
  $('input[name=ch]:radio').attr('checked',false);


  @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif





});



  function confirm_delete(status){
    if (!confirm('Do you really want to '+status+'Blog?')) {
    return false;
  }
}
</script>
@stop