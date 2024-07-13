@extends('back.layout.pageslayout')
@section('pageTitle', Isset($pageTitle) ? $pageTitle : 'DEREVA')
@section('content')


    <div class="row">

       <div class="col-md-12">

              <div class="clearfix">

                   <div class="pull-left">

                       <h4 class="text-blue">Categories</h4>

                   </div>



                   <div class="pull-right">

                   <a href="" class="btn btn-success btn sm">

                    <i class fa fa-plus>  </fa-plus>

                        Add category

                   </a>

                   </div>

              </div>

       </div>

    </div>

@endsection