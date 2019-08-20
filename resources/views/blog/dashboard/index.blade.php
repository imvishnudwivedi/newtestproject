@extends('blog.layouts.dashboard')

@section('title','Dashboard')

@section('page_title_sub', 'Place where it start\'s')

@section('content')
  <div class='row'>
      <div class='col-md-12'>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>



            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="col-md-12">
               <div class="clearfix"></div>
             <div class="col-lg-4 col-xs-6">
               <!-- small box -->


             </div><!-- ./col -->
               <div class="col-lg-4 col-xs-6">

             </div>
             <div class="col-lg-4 col-xs-6">

             </div>
          <div class="col-lg-4 col-xs-6">

             </div>


          </div>
          <div class="box-footer">

        </div>
      </div>
      </div>


      </div>
@endsection

@section('script')
@parent

<script type="text/javascript">



</script>
@stop