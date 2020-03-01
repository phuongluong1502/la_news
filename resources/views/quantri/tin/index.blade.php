<style>
  
  table.dataTable.nowrap td {white-space:normal}
</style>
@extends('quantri.layoutquantri')
@section('pagetitle', 'Danh sách tin') 
@section('main')
<div class="row">
<div class="wd-940 mg-l-30">
  <table id="datatable1" class="table display responsive nowrap">
    <thead> <tr>
            <th>idTin/Ngày</th>
            <th>Tiêu đề / Tóm Tắt</th>            
            <th width="160">Chỉnh / Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ds as $row)
        <tr>
            <td>
		 idTin: {{ str_pad($row->idTin, 3,'0',STR_PAD_LEFT) }}<br/>
             {{$row->Ngay->format('d/m/Y')}}<br/>
             Xem:{{$row->SoLanXem}}<br/>
            </td>
            <td>
            <h5>{{$row->TieuDe}} </h5>
            <p>{{$row->TomTat}} </p>
            </td>           
            <td>
            <a href="{{ route('tintuc.edit',$row->idTin)}}" class="btn btn-primary"> Chỉnh </a>
             <form method="post" action="{{ route('tintuc.destroy' , $row->idTin)}}">
               {{ csrf_field()}}
               {!! method_field('delete') !!}
               <button class="btn btn-danger" type="submit" onclick="return confirm('Xóa hả?'); " class="d-inline mg-l-10"  >Xóa</button>
            </form>
	  <div class="anhien">@if ($row->AnHien==1)Đang hiện @else Đang ẩn @endif </div> 
	  <div class="noibat">@if ($row->TinNoiBat==1) Tin NB @else Tin BT @endif </div>
        </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
@section('jsscript')
<script src="{{ asset('public/lib') }}/datatables/jquery.dataTables.js"></script>
<link href="{{ asset('public/lib') }}/datatables/jquery.dataTables.css" rel="stylesheet">
    <script>
      $(function(){
        $('#datatable1').DataTable({
          responsive: true,     
      pageLength:5,       
          language: {
            searchPlaceholder: 'Tìm kiếm...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
    paginate: {previous: " < ", next:" > " },
    "lengthMenu": "Hiện _MENU_ tin trong mỗi trang",
    "zeroRecords": "Không tìm thấy",
    "info": "Đang hiện trang _PAGE_ trong _PAGES_ trang",
    "infoEmpty": "Không có dòng nào",
    "infoFiltered": "(Lọc trong _MAX_ tin)",
          }
        });
      });
    </script>
@endsection

