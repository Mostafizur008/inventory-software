<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>

    .invoice {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box {
		
		
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
			
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: rgb(255, 255, 255);
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

	


    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #ffffff;}
    
    #customers tr:hover {background-color: rgb(255, 255, 255);}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
	  background-color: #ff9100;
      color: rgb(0, 0, 0);
	}

 #mrs{
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #mrs td, #mrs th {
      border: 1px solid rgb(255, 255, 255);
      padding: 8px;
    }
    
    #mrs tr:nth-child(even){background-color: #ffffff;}
    
    #mrs tr:hover {background-color: rgb(255, 255, 255);}
    
    #mrs th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
	  background-color: #ffffff;
      color: rgb(0, 0, 0);
    }

		</style>
	</head>

<body>


<div class="invoice">

	@php
	$setting = DB::table('settings')->first();  
	@endphp
	
<img style="position:absolute;top:0.40in;left:0.75in;width:1.7in;height:0.43in" src="{{public_path('backend/all-images/web/logo/'.$setting->image)}}" />
<div style="position:absolute;top:0.90in;left:0.50in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529">{{$setting->address}}</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.40in;left:0.50in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529">Mobile : {{$setting->contract}}, <br><font color="white">Mobile : </font>{{$setting->contract2}}</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1.90in;left:0.50in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529">Email : {{$setting->email}}</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>

<div style="position:absolute;top:0.40in;left:4.90in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Segoe UI;color:#ff1100">Stock Report</span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:0.70in;left:4.70in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529"></span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>
<div style="position:absolute;top:1in;left:4.70in;width:2.30in;line-height:0.23in;"><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:Segoe UI;color:#212529"> </span><span style="font-style:normal;font-weight:normal;font-size:17pt;font-family:Segoe UI;color:#212529"> </span><br/></SPAN></div>

<div class="invoice-box">
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
	<table id="customers">
		<thead>
		<tr>
		  <th>Id</th>
		  <th>Supplier</th>
		  <th>Product Name</th>
		  <th>Category</th>
		  <th>In Qty</th>
		  <th>Out Qty</th>
		  <th>Unity</th>
		</tr>
		</thead>
		<tbody>
		  @foreach ($allData as $key=>$user)
		  @php
		  $buying_total = App\Models\Others\Purchase\Purchase::where('category_id',$user->category_id)->where('product_id',$user->id)->where('status','1')->sum('buying_qty');
		  $selling_total = App\Models\Others\Invoice\InvoiceDetail::where('category_id',$user->category_id)->where('product_id',$user->id)->where('status','1')->sum('selling_qty');
		  @endphp
		<tr>
		  <td>#{{$key+1}}</td>
		  <td>{{$user['supplier']['name']}}</td>
		  <td>{{$user->name}}</td>
		  <td>{{$user['cat']['name']}}</td>
		  <td>{{$buying_total}}</td>
		  <td>{{$selling_total}}</td>
		  <td>{{$user->quantity}} {{$user['unit']['name']}}</td>
	  
		  @php
		  $count_product = App\Models\Others\Purchase\Purchase::where('product_id',$user->id)->count();
		  @endphp
		</tr>
		@endforeach
		</tbody>
	  </table>
<br/>
<i style="font-size: 10px; float: right;">Print Date: {{date('d M Y')}} </i>

</div>

</body>

</html>

