@extends('admin.layout')
@section('main')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">DANH SÁCH THỂ LOẠI</h1>    
  <table class="table table-striped">
    <thead> <tr>
            <td>idTL</td>
            <td>Tên TL</td>
            <td>Thứ tự</td>
            <td>Ẩn hiện</td>
            <td>Hiện Menu</td>
            <td>Ngôn ngữ</td>
            <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($dstl as $tl)
        <tr>
            <td>{{$tl->idTL}}</td>
            <td>{{$tl->TenTL}}</td>
            <td>{{$tl->ThuTu}}</td>
            <td>{{$tl->AnHien}}</td>
            <td>{{$tl->HienMenu}}</td>
            <td>{{$tl->lang}}</td>
            <td>
            <a href="{{ route('theloai.edit',$tl->idTL)}}" class="btn btn-primary"> 
                Chỉnh 
             </a>
            </td>
            <td>
             <form action="{{ route('theloai.destroy' , $tl->idTL)}}" method="post">
               {{ csrf_field()}}
               {!! method_field('delete') !!}
               <button class="btn btn-danger" type="submit" onclick="return confirm('Xóa hả?'); " >Xóa</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
