@extends('backend.main-section.body.main')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <br/>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="col-12" align="center">
                   <strong>Supplier wise report</strong>
                   <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value"> &nbsp; &nbsp;
                   <strong>Product wise report</strong>
                   <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
                </div>
                </div><br/>
                <div class="show_supplier" style="display: none;">
                    <form method="GET" action="{{route('sp.pdf.view')}}" target="_blank" id="getwise">
                        <div class="form-row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-3">
                                <select name="supplier_id" class="form-control select2">
                                    <option>Select Supplier</option>
                                    @foreach ($supplier as $sp)
                                        <option value="{{$sp->id}}">{{$sp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success waves-effect waves-light" value="Search">
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </form>
                </div>
                <div class="show_product" style="display: none;">
                    <form method="GET" action="{{route('product.pdf.view')}}" target="_blank" id="getwise">
                        <div class="form-row">
                            <div class="col-sm-3"></div>
                            <div class="col-md-3 mb-0">
                                <div class="form-group">
                                    <select name="category_id" id="category_id" class="form-control select2">
                                        <option value="" selected="" disabled="">Chose Category</option>
                                        @foreach ($cat as $sp)
                                        <option value="{{$sp->id}}">{{$sp->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>  
                            <div class="col-md-3 mb-0">
                                <div class="form-group">
                                    <select name="product_id" id="product_id" class="form-control select2">
                                        <option value="" selected="" disabled="">Chose Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success waves-effect waves-light" value="Search">
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </form>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('backend.code-section.ajax-script.dependency.invoice')

  <script type="text/javascript">
     $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value == 'supplier_wise'){
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
     });

     $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value == 'product_wise'){
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
     });
  </script>

  @endsection