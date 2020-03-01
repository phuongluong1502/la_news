<div class="kt-sideleft">
  <label class="kt-sidebar-label">Navigation</label>
  <ul class="nav kt-sideleft-menu">
    <li class="nav-item">
      <a href="index.html" class="nav-link active">
        <i class="icon ion-ios-home-outline"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- nav-item -->
    <li class="nav-item">
       <a href="" class="nav-link with-sub">
          <i class="icon ion-ios-gear-outline"></i> <span>Loại tin</span>
        </a>
     <ul class="nav-sub">
      <li class="nav-item"><a href="{{ route('loaitin.create')}}" class="nav-link">Thêm loại tin</a></li>
      <li class="nav-item"><a href="{{ route('loaitin.index')}}" class="nav-link">Danhs sách loại tin</a></li>
      </ul>
  </li>  
  </ul>
</div><!-- kt-sideleft -->