@extends('layouts.default')

@section('navbar')
@include('partials._navbar')
@stop

@section('content')
<div class="padding">
  <div class="full col-sm-9">

    <!-- content -->                      
    <div class="row">

     <!-- main col left --> 
     <div class="col-sm-5">

      <div class="panel panel-default">
        <div class="panel-thumbnail"><img src="/assets/example/bg_5.jpg" class="img-responsive"></div>
        <div class="panel-body">
          <p class="lead">Urbanization</p>
          <p>45 Followers, 13 Posts</p>

          <p>
            <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
          </p>
        </div>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
        <div class="panel-body">
          <div class="list-group">
            <a href="http://bootply.com/tagged/modal" class="list-group-item">Modal / Dialog</a>
            <a href="http://bootply.com/tagged/datetime" class="list-group-item">Datetime Examples</a>
            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Data Grids</a>
          </div>
        </div>
      </div>

      <div class="well"> 
       <form class="form-horizontal" role="form">
        <h4>What's New</h4>
        <div class="form-group" style="padding:14px;">
          <textarea class="form-control" placeholder="Update your status"></textarea>
        </div>
        <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
      </form>
    </div>

    <div class="panel panel-default">
     <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
     <div class="panel-body">
      <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
      <div class="clearfix"></div>
      There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
      <hr>
      <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
    <div class="panel-body">
      Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp; intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable components for navigation, pagination, labels, alerts etc..                          </div>
    </div>



  </div>

  <!-- main col right -->
  <div class="col-sm-7">

    <div class="well"> 
     {{ Form::open(['name' => 'updatestatus_form', 'class' => 'form-horizontal', 'role' => 'form', 'route' => ['users.post_status']]) }}
     <h4>What's New</h4>
     <div class="form-group" style="padding:14px;">
      <textarea name="post_status" class="form-control" placeholder="Update your status"></textarea>
    </div>
    <button class="btn btn-primary pull-right" type="submit">Post</button><ul class="list-inline"><li></li><li></li><li></li></ul>
    {{ Form::close() }}
  </div>

  @if(count($posts) > 0 )
  @foreach($posts as $post)
  <div class="panel panel-default">
   <div class="panel-heading"> <h4>{{ $post->user()->first()->first_name.' '.$post->user()->first()->last_name }} </h4></div>
   <div class="panel-body">


    <p>{{ $post->status }}</p>

    <a href="" style="color:blue">Like</a>
    <hr>
    @if(count(getCommentsFromPost($post->id)) > 0)
    @foreach(getCommentsFromPost($post->id) as $comment)
      {{ $comment->comment }}
    @endforeach
    @endif
    {{ Form::open(['name' => 'comment_form', 'route' => ['users.comment']]) }}
      <div class="form-group">
        <input type="hidden" name="post_id" class="form-control" value="{{ $post->id }}">
        <input type="text" name="comment" class="form-control" placeholder="Add a comment..">
      </div>
    {{ Form::close() }}


  </div>
</div>
@endforeach
@else
<h1>No Posts Available</h1>
@endif



</div>
</div><!--/row-->

</div><!-- /col-9 -->
</div><!-- /padding -->
@stop