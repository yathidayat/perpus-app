<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI MEKAR</div>
    </a>

    <hr class="sidebar-divider my-0">

    @php
        $menus = App\Models\Menu::getUserMenus(auth()->user());
    @endphp

    @foreach($menus as $menu)
        @if($menu->children->isEmpty())
            <li class="nav-item">
                <a class="nav-link" href="{{ $menu->route ? route($menu->route) : '#' }}">
                    <i class="fas fa-fw {{ $menu->icon ?? 'fa-circle' }}"></i>
                    <span>{{ $menu->nama_menu }}</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                   data-target="#collapse{{ $menu->id }}" 
                   aria-expanded="true" aria-controls="collapse{{ $menu->id }}">
                    <i class="fas fa-fw {{ $menu->icon ?? 'fa-folder' }}"></i>
                    <span>{{ $menu->nama_menu }}</span>
                </a>
                <div id="collapse{{ $menu->id }}" class="collapse" 
                     aria-labelledby="heading{{ $menu->id }}" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ $menu->nama_menu }}:</h6>
                        @foreach($menu->children as $submenu)
                            <a class="collapse-item" href="{{ route($submenu->route) }}">
                                {{ $submenu->nama_menu }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </li>
        @endif
    @endforeach

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>