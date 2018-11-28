@extends('templates.travel.master')
@section('css')
    <style type="text/css">
        .noidung{
            margin: 0px auto;
            /* width: 1020px; */
            /* background-color: pink;
            /* margin-left: 184px; */
            margin-bottom: 40px;
            margin-top: 40px;
            /* border-top: dashed; */ */
        }
        .hd{
           margin: 0px auto;
            /* background-color: pink; */
           width: 1020px; 
        }
        td,th{
            text-align: center;
            padding-top: 5px; 
             padding-left: 10px; 
             margin-bottom: 10px;
             width: 200px;
        }
        table{
            margin-bottom: 10px;
			display: block;	
        }
    </style>
@stop
@foreach($objItem as $key => $objItem)
@section('content')
<div class="noidung">

        <div class="hd">
            <h3 align="center" style="color: red">HÓA ĐƠN ĐẶT TOUR</h3>
            <table border="5px">
                <thead>
                    <tr>
                    	<th>Tên tour</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số người lớn</th>
                        <th>Số trẻ em</th>
                        <th>Số trẻ nhỏ</th>
                        <th>ngày khởi hành</th>
                        <th>điểm khởi hành</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán trực tuyến</th>
                        <th>Thanh toán trực tiếp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    	<td>{{ $ten }}</td>
                        <td>{{ $objItem->ten  }}</td>
                        <td>{{ $objItem->ngaydat  }}</td>
                        <td>{{ $objItem->nguoilon  }}</td>
                        <td>{{ $objItem->treem  }}</td>
                        <td>{{ $objItem->trenho  }}</td>
                        <td>{{ $ngaykh }}</td>
                        <td>{{ $diemkh }}</td>
                        <td>{{ $objItem->thanhtien }} VNĐ</td>
                        <td><div id="paypal-button-container"></div></td>
                        <td><button onclick="window.history.back()" >đặt xong</button></td>
                    </tr>
                    <tr>
                        <td colspan="11" text-align="left"><h4>Thông tin khách đi cùng: </h4>{{ $objItem->thongtinkh }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
</div>
    
@stop
@section('js')
<script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AWwCNyNkV62Vol6zsF8OF9zXdR4KfDNODXpuIXYfkWaJD9I0X1X77bZD6VNl1lnrbn9JTjboPger1797',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '{{ $objItem->thanhtien }}', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');

    </script>
@stop
@endforeach