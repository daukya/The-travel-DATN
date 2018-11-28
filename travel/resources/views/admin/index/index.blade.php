@extends('templates.admin.master')
@section('content')
 <div align="center" margin-top="100px"><img height="600" src="{{ $urlAdmin }}/img/AW446127_08.gif" alt=""></div>
 <h2 align="center"><span style="color: red">{{ session('msg') }}</span></h2>
@stop
