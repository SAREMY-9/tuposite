@extends('back.layout.pageslayout')
@section('pageTitle', Isset($pageTitle) ? $pageTitle : 'Tupo')
@section('content')

    <div class="row">

        <div class="col md-12">

          <div class="pd-20 card-box mb-30">

           <div class="clearfix">


                <div class="pull-left">

                  <h4 class="text-dark"> Add Category </h3>
                    
        
                </div>

               <div class="pull-right">

                   <a href="{{ route('admin.manage-categories.cats-subcats-list')}}" class="btn btn-succcess btn-sm">

                    <i class="ion-arrow-left-a"></i> Back to categories list 
                </div>
          </div>
          <hr>


          <form action="{{ route('admin.manage-categories.store-category')}}"  method="POST"   enctype="muiltipart/form-data"  class="mt-3">

              @csrf

              @if(Session::get('success'))


              <div class="alert alert-success">

              <strong> <i class="dw dw-checked"></i></strong>

                  {!! Session::get('success')!!}

                  <button type="button" class="close"  data-dismiss="alert"  aria-label="Close">

                  <span aria-hidden="true"> &times;</span>
                  </button>

              </div>


              @endif



               @if(Session::get('fail'))


              <div class="alert alert-danger">

              <strong> <i class="dw dw-checked"></i></strong>

                  {!! Session::get('fail')!!}

                  <button type="button" class="close"  data-dismiss="alert"  aria-label="Close">

                  <span aria-hidden="true"> &times;</span>
                  </button>

              </div>


              @endif

              <div class="row">

                 <div class="col-md-7">

                    <div class="form-group">

                        <label for=""> Category name</label>

                        <input type="text" class="form-control" name="category_name"  
                        
                        placeholder="Enter category name"  value="{{  old('category_name') }}">

                        @error('category_name')

                        <span class="text-danger ml-2">


                        {{$message}}

                        </span>


                        @enderror

                    </div>

                 </div>



                  <div class="col-md-7">

                    <div class="form-group">

                        <label for=""> Category image</label>

                    
                        <input type="file" name="category_image" id=""  class="form-control"> 

                        @error('category_image')

                        <span class="text-danger ml-2">


                        {{$message}}

                        </span>


                        @enderror

                    </div>

                 </div>
              </div>
              <button type="submit" class="btn btn-success">CREATE</button>
          </form>
          </div>
        </div>

    </div>

@endsection


