<aside class="sidebar inactive" id="asidebar-container">
    <ul class="navigation">
        <li>
            
            <a href="{{ route('creador.creador') }}">
                <i class="fas fa-folder-plus"></i>
                Crear carpeta</a>
        </li>

        <li>
            <a class="icon-container" href="{{ route('pdf.index') }}">
                <i class="fas fa-folder-open"></i>
                GLOBAL
            </a>
        </li>
</ul></aside>



<button id="toggle-aside-button" class="navbar-toggle-button">
    <a class="icon-container">
        <i class="fas fa-angle-double-right"></i>
</a>
  </button>

        
  @include('layouts.modal')



            

