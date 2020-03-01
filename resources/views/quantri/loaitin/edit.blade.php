@extends('quantri.layoutquantri')
@section('pagetitle', 'Sửa loại tin') 
@section('main')
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<form method="post" action="{{ route('loaitin.update', $row->idLT) }}" >
{{ csrf_field()}}
{!! method_field('patch') !!}
<div class="wd-600 mg-l-30">
  <div class="d-flex flex-column wd-600">
    <div class="form-group mg-b-20">
      <label>Tên: <span class="tx-danger">*</span></label>
      <input type="text" name="Ten" class="form-control" placeholder="Nhập tên loại tin" required value="{{ $row->Ten }}">
    </div>
    <div class="form-group mg-b-20">
      <label>Thứ tự:</label>
      <input type="text" name="ThuTu" value="{{ $row->ThuTu }}" class="form-control" placeholder="Nhập thứ tự của loại tin">
    </div>
  </div>
  	<div class="d-flex justify-content-around">  
  	<div class="d-flex form-group mg-b-20">
		<label class="rdiobox">
	 	 <input name="AnHien" type="radio" value="1" @if ($row->AnHien === 1)  checked @endif ><span>Hiện</span>
		</label> &nbsp; 
		<label class="rdiobox">
	 	 <input name="AnHien" type="radio" value="0" @if ($row->AnHien === 0)  checked @endif ><span>Ẩn</span>
		</label>
	</div>
	<div class="d-flex form-group mg-b-20">
		<label class="rdiobox">
	 	 <input name="lang" type="radio" value="vi" @if ($row->lang === "vi")  checked @endif><span>Tiếng Việt</span>
		</label> &nbsp; 
		<label class="rdiobox">
	 	 <input name="lang" type="radio" value="en" @if ($row->lang === "en")  checked @endif><span>English</span>
		</label>
	</div>
	</div>
	<select name="idTL" class="form-control select2 mg-b-20">
	 @php
		   $kq = DB::select("select idTL, TenTL from theloai order by ThuTu");
		   foreach ($kq as $rowTL ) {
		if ($rowTL->idTL !=$row->idTL) 
		    echo "<option value='{$rowTL->idTL}'>{$rowTL->TenTL}</option>";	
			else 
		    echo "<option value='{$rowTL->idTL}' selected>{$rowTL->TenTL}</option>";	
		   }
	 @endphp

	  @php
	   $kq = DB::select("select idTL, TenTL from theloai order by ThuTu");
	   foreach ($kq as $rowTL ) {
			echo "<option value='{$rowTL->idTL}'>{$rowTL->TenTL}</option>";	
	   }
	  @endphp
	  
	</select>

  <button type="submit" class="btn btn-default">LƯU DATABASE</button>
</div>

</form>
 
@endsection
