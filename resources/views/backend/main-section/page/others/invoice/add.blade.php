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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-0">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" name="invoice_no" class="form-control text-center" id="invoice_no" value="{{$invoice_no}}" style="background-color: #D8FDBC" readonly>
                            </div>
                         </div>
                        <div class="col-md-2 mb-0">
                            <div class="form-group">
                                <label>Date <span class="text-red"> *</span></label>
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input type="text" name="date" id="date" value="{{$date}}" required class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">Category <span class="text-red"> *</span></label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($cat as $sp)
                                    <option value="{{$sp->id}}">{{$sp->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-3 mb-0">
                            <div class="form-group">
                                <label>Product Name <span class="text-red"> *</span></label>
                                <select name="product_id" id="product_id" class="form-control select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 mb-0">
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="current_stock_qty" class="form-control text-center" id="current_stock_qty" style="background-color: #f5d7f2" readonly>
                            </div>
                         </div>
                        <div class="form-group col-md-1 mb-0" style="padding-top: 30px">
                           <a class="btn btn-primary addeventmore"> <i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>         
                    </div>
              <!-- /.card -->
              <div class="card-body">
                <form action="{{route('store.invoice')}}" method="post" id="myForm">
                    @csrf
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th width="10%">Unity</th>
                          <th width="10%">Unit Price</th>
                          <th width="15%">Total Price</th>
                          <th width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">

                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4"></td>
                                <td><input type="text" name="discount_amount" id="discount_amount" placeholder="Enter Discount" class="form-control form-control-sm text-right discount_amount" style="background-color:#f5dac2"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td><input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color:#D8FD8A"></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4">
                                    <div class="col-md-5 mb-0">
                                    <select name="customer_id" id="customer_id" class="form-control form-control-sm select2">
                                        <option disabled selected>Select Customer</option>
                                        <option value="0">New Customer</option>
                                            @foreach ($customer as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}} - {{$ct->mobile}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                      <div class="col-md-12 mrs-3" style="display: none;"><br/>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control form-control-sm">
                                            </div>
                                        <div class="col-md-3">
                                            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-3">
                                            <textarea type="text" name="address" id="address" placeholder="Enter Address" class="form-control form-control-sm"></textarea>
                                        </div>
                                        </div>
                                      </div>
                                </td>
                                <td>
                                    <div class="">
                                        <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                            <option disabled selected>Paid Status</option>
                                          <option value="full_paid">Full Paid</option>
                                          <option value="full_due">Full Due</option>
                                          <option value="partial_paid">Partial Paid</option>
                                        </select>
                                        <input type="text" name="paid_amount" id="paid_amount" class="form-control form-control-sm text-right paid_amount" placeholder="Paid Amount" style="display: none;">
                                      </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                      </table>
                      
                      <div class="col-sm-12 col-md-12">
                        <div class="text-right">
                         <input type="submit" id="storeButton" class="btn btn-success waves-effect waves-light" value="Invoice Store">
                        </div>
                     </div>
                  </form>
              </div>
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    @include('backend.code-section.ajax-script.dependency.invoice')
    
<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" name="selling_qty[]" value="1" class="form-control form-control-sm text-right selling_qty">
        </td>
        <td>
            <input type="number"  name="unit_price[]" value="" class="form-control form-control-sm text-right unit_price">
        </td>
        <td>
            <input type="text" name="selling_price[]" value="0" class="form-control form-control-sm text-right selling_price" readonly>
        </td>
        <td>
            <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
        </td>
    </tr>
</script>

<script type="text/javascript">
$(document).ready(function(){
    $(document).on("click",".addeventmore",function(){
        var date = $('#date').val();
        var invoice_no = $('#invoice_no').val();
        var category_id = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id = $('#product_id').val();
        var product_name = $('#product_id').find('option:selected').text();
        if(date==''){
            $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if(category_id==''){
            $.notify("Category is required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if(product_id==''){
            $.notify("Product is required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var data = {
            date:date,
            invoice_no:invoice_no,
            category_id:category_id,
            category_name:category_name,
            product_id:product_id,
            product_name:product_name
        };
        var html = template(data);
        $("#addRow").append(html);
    });
    $(document).on('click','.removeeventmore',function(event){
        $(this).closest(".delete_add_more_item").remove();
        totalAmountPrice();
    });

    $(document).on('keyup click','.unit_price,.selling_qty',function(){
        var unit_price = $(this).closest("tr").find("input.unit_price").val();
        var qty = $(this).closest("tr").find("input.selling_qty").val();
        var total = unit_price * qty;
        $(this).closest("tr").find("input.selling_price").val(total);
        $('#discount_amount').trigger('keyup');
    });
    $(document).on('keyup','#discount_amount',function(){
        totalAmountPrice();
    })
    function totalAmountPrice(){
        var sum=0;
        $(".selling_price").each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.lenght != 0){
                sum += parseFloat(value);
            }
        });
        var discount_amount = parseFloat($('#discount_amount').val());
        if(!isNaN(discount_amount) && discount_amount.lenght != 0){
                sum -= parseFloat(discount_amount);
            }
        $('#estimated_amount').val(sum);
    }
});

</script>
   
@endsection