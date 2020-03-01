<?php 
  function doimau($str, $tukhoa)
  {
    return str_replace($tukhoa,"<span style='color:red'>$tukhoa</span>", $str);
  }
?>
<h1 class="page-title">Kết Quả Từ Khóa: {{$tukhoa}} </h1>
@foreach($listtin as $row)
<article class="entry card post-list">
  <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url('{{$row->urlHinh}}')">
    <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}" class="thumb-url"></a>
    <img src="{{$row->urlHinh}}" alt="" class="entry__img d-none">
    <?php 
      $loaitin = \DB::select("SELECT Ten FROM loaitin, tin WHERE tin.idLT = loaitin.idLT AND idTin = $row->idTin");
    ?>
    <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">{{$loaitin[0]->Ten}}</a>
  </div>

  <div class="entry__body post-list__body card__body">
    <div class="entry__header">
      <h2 class="entry__title">
        <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">{!! doimau($row->TieuDe,$tukhoa) !!}</a>
      </h2>
      <ul class="entry__meta">
        <li class="entry__meta-date">
          {{date('d/m/Y',strtotime($row->Ngay))}}
        </li>
      </ul>
    </div>        
    <div class="entry__excerpt">
      <p>{{$row->TomTat}}</p>
    </div>
  </div>
</article>
@endforeach

<!-- Pagination -->
<?php echo $listtin->links('vendor.pagination.default'); ?>