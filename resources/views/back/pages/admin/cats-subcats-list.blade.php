@extends('back.layout.pageslayout')
@section('pageTitle', Isset($pageTitle) ? $pageTitle : 'DEREVA')
@section('content')


    <div class="row">

    

       <div class="col-md-12">

              <div class="clearfix">

                   <div class="pull-left">

                       <h4 class="text-green">Categories</h4>

                   </div>



                   <div class="pull-right">

                   <a href="{{ route('admin.manage-categories.add-category')}}" class="btn btn-success btn sm">

                    <i class fa fa-plus>  </fa-plus>

                        Add category

                   </a>

                   </div>
              </div>

            <div class="table-responsive mt-4">

              <table class="table table-borderless.table-striped">

              <thead class="bg-success text-white">

              <tr>

              <th>Category image</th>
              <th>Category name</th>
              <th>No of sub-categories</th>
              <th>Actions</th>
              </tr>
              </thead>

              <tbody>


              <tr>

              <td>

                  <div class="avatar mr-2">

                  <img src="" width="50"  height="50" alt="">

                  </div>
              </td>

              <td>

                  Electronics             
              </td>

               <td>

                  12          
              </td>

               <td>

                  <div class="table-actions">

                  <a href=""  class="text-success">

                  <i class="dw dw-edit2">    </i>
                  </a>

                   <a href=""  class="text-danger">

                  <i class="dw dw-delete-3">    </i>
                  </a>

                  </div>           
              </td>
              </tr>
              </tbody>

              </table>


            </div>

       </div>


       

            <div class="col-md-12">

                <div class="clearfix">

                   <div class="pull-left">

                       <h4 class="text-green">Sub Categories</h4>

                   </div>



                   <div class="pull-right">

                      <a href="" class="btn btn-success btn sm">

                        <i class fa fa-plus>  </fa-plus>

                         Add sub-category

                       </a>

                   </div>
                 </div>

            <div class="table-responsive mt-4">

              <table class="table table-borderless.table-striped">

              <thead class="bg-success text-white">

              <tr>

             
              <th>sub-category name</th>
               <th>Category name</th>
                <th>No of Childs Sub</th>
              <th>Actions</th>
              </tr>
              </thead>

              <tbody>


              <tr>

            

              <td>

                 Mobile & Computer

              </td>

               <td>

                  Electronics     
              </td>

              <td>

                  Electronics     
              </td>


               <td>

                  <div class="table-actions">

                  <a href=""  class="text-success">

                  <i class="dw dw-edit2">    </i>
                  </a>

                   <a href=""  class="text-danger">

                  <i class="dw dw-delete-3">    </i>
                  </a>

                  </div>           
              </td>
              </tr>
              </tbody>

              </table>


        </div>

            </div>

    </div>

@endsection