@extends('layout')
@section('title','Tin tức tổng hợp')
@section('tinmoinhan')
<?= view('tinmoinhan',['lang'=>$lang]);?>
@stop
@section('tinnoibat')
<?= view('tinnoibat',['lang'=>$lang]);?>
@stop
@section('content')
<?=view('tinmoinhat',['lang'=>$lang]);?>
@stop
@section('sidebar')
<?=view('tinxemnhieu',['lang'=>$lang]);?>
<?=view('loaitin',['lang'=>$lang]);?>
<?=view('banxemchua',['lang'=>$lang]);?>
@stop
@section('carousel')
<?=view('carousel',['lang'=>$lang]);?>
@stop