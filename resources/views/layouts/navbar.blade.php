<aside class="sidebar">
    <ul class="navigation">
        <li>
            <a href="{{ route('creador.creador') }}">Crear carpeta</a>
        </li>

        <li>
            <a class="icon-container" href="{{ route('pdf.index') }}">
                <i class="fas fa-folder-open"></i>
                GLOBAL
            </a>
        </li>

        <li class="icon-container">
            <a  href="{{ route('sistemas.index') }}">
                <i class="fas fa-folder-open"></i>
                sistemas
            </a>
            <a>
                <form action="{{ route('eliminar.carpeta') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta carpeta?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="nombreParametro" value="sistemas"> <!-- Agrega un campo oculto con el valor de nombreParametro -->
                    <button type="submit" class="icon-container">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </a>
            
        </li>
        
        </ul></aside>
        



            

