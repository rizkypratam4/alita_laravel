<li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
      <span class="pc-micon"><i class="{{ $menuIcon }}"></i></span> <!-- Ikon dinamis -->
      <span class="pc-mtext">{{ $menuTitle }}</span>
      <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    
    @if(count($submenu) > 0)
      <ul class="pc-submenu">
        @foreach($submenu as $subitem)
          <li class="pc-item"><a class="pc-link" href="{{ $subitem['url'] }}">{{ $subitem['text']}}</a></li>
        @endforeach
      </ul>
    @endif
</li>
  