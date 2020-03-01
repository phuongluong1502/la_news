@extends('layout')
@section('title',$title)
@section('content')
<?=view('detail',['ctTin'=>$ctTin, 'lang'=>$lang]);?>
@stop
@section('sidebar')
<?=view('tinxemnhieu',['lang'=>$lang]);?>
<?=view('loaitin',['lang'=>$lang]);?>
<?=view('banxemchua',['lang'=>$lang]);?>
@stop