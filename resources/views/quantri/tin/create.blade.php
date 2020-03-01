@extends('quantri.layoutquantri')
@section('pagetitle', 'Thêm tin') 
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

<form method="post" action="{{ route('tintuc.store') }}">
{{ csrf_field()}}
<div class="wd-910 mg-l-30">
  <div class="d-flex flex-column wd-910">
    <div class="form-group mg-b-20">
      <input type="text" name="TieuDe" class="form-control" placeholder="Nhập tiêu đề tin" required>
    </div>
    <div class="form-group mg-b-20">
      <textarea name="TomTat" rows="3" class="form-control" placeholder="Nhập tóm tắt của tin"></textarea>
    </div>
    <div class="form-group mg-b-20">
      <input type="text" name="urlHinh" class="form-control" placeholder="Nhập urlHinh tin" required>
    </div>
  </div>
   <div class="d-flex mg-l-50">  
  	<div class="d-flex form-group mg-b-20">
		<label class="rdiobox">
	 	 <input name="AnHien" type="radio" value="1" checked><span>Hiện</span>
		</label> &nbsp; 
		<label class="rdiobox">
	 	 <input name="AnHien" type="radio" value="0" ><span>Ẩn</span>
		</label>
	</div>
	<div class="d-flex form-group mg-b-20">
		<label class="rdiobox">
	 	 <input name="lang" type="radio" value="1" checked><span>Tiếng Việt</span>
		</label> &nbsp; 
		<label class="rdiobox">
	 	 <input name="lang" type="radio" value="0" ><span>English</span>
		</label>
	</div>
	</div>
	<div class="d-flex">
	<div class="d-flex form-group mg-b-20">
		<select name="idTL" class="form-control select2 mg-b-20">
		  <option value="0">Chọn thể loại</option>
		  @php
   $kq = DB::select("select idTL, TenTL from theloai order by ThuTu");
   foreach ($kq as $rowTL ) {
		echo "<option value='{$rowTL->idTL}'>{$rowTL->TenTL}</option>";	
   }
@endphp
	  
		</select>
		<script>
 $(document).ready(function(){
	$("[name='idTL']").change(function(){ 
	    var idTL= $(this).val();alert(idTL);
	    $("[name='idLT']").load("/la_news/layloaitintrong1theloai/" + idTL);
	});
});
</script>

	</div>
	<div class="d-flex form-group mg-b-20 mg-l-50">
		<select name="idLT" class="form-control select2 mg-b-20">
		  <option value="0">Chọn loại tin</option>	  
		</select>
	</div>	
	</div>

  <button type="submit" class="btn btn-default">LƯU DATABASE</button>
</div>

</form>
 
@endsection
