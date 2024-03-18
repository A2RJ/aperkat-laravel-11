 <div class="sidebar-heading">
     User
 </div>
 <li class="nav-item">
     <a class="nav-link" href="{{ route('ppuf.index') }}">
         <i class="fas fa-fw fa-table"></i>
         <span>PPUF</span>
     </a>
 </li>

 <li class="nav-item">
     <a class="nav-link" href="{{ route('submission.index') }}">
         <i class="fas fa-fw fa-table"></i>
         <span>Pengajuan</span>
     </a>
 </li>

 @if (auth()->user()->hasSubDivision()->pluck('id')->toArray())
 <li class="nav-item">
     <a class="nav-link" href="{{ route('sub-division.on-proccess') }}">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pengajuan Sub Divisi</span>
    </a>
</li>
@endif
