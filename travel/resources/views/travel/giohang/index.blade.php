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
        table {
            border: 5;
            
        }
    </style>
@stop
@section('content')
<div class="noidung">
        <div class="hd">
            
            @if(!empty(session('msg')))
            <h3 align="center" style="color: red">{{ session('msg') }}</h3>
            	<?php die();?>
            @else
            <h3 align="center" style="color: red">Giỏ hàng</h3>
            @endif

            <table border="5">
                <thead>
                    <tr>
                    	<th>id</th>
                        <th>Tên tour</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Xóa</th>
                        <th>Đặt</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($gioTour as $key => $objItem)
                	@php
                		$slug = Str_slug($objItem->name);
                	@endphp
                    <tr>
                    	<td>{{ $objItem->id }}</td>
                        <td><a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $objItem->id]) }}" class="link-btn">{{ $objItem->name  }}</a></td>
                        <td><img width="200px" src ="/storage/app/files/{{ $objItem->options->img }}" /></td>
                        <td>{{ $objItem->price  }}</td>
                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa khỏi giỏ hàng')" href="{{ route('travel.giohang.remove',['rowId'=>$objItem->rowId])}}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /></a></td>
                        <td><a href="{{ route('travel.tour.phieudat',['id' => $objItem->id,'slug'=>$slug]) }}"><button>Đặt ngay</button></a> </td>

                    </tr>
                 @endforeach    
                    <tr><td><a href="{{ route('travel.giohang.delall') }}"><button>xóa hết</button></a></td></tr><td>

                </tbody>

            </table>
        </div>
</div>
   
@stop