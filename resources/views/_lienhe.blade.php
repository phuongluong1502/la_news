@extends('layout')
@section('title', $title)
@section('content')
<?=View::make('lienhe',['lang'=>$lang,"thongbao"=>"","tieptuc"=>""]);?>
@stop
@section('sidebar')
<?=View::make('tinxemnhieu',['lang'=>$lang]);?> 
<?=View::make('loaitin',['lang'=>$lang]);?> 
<?=View::make('banxemchua',['lang'=>$lang]);?>
@stop
