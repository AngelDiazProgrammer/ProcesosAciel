<aside class="sidebar">
    <ul class="navigation">
        <li>
            <a href="{{ route('creador.creador') }}">Crear carpeta</a>
        </li>

        <li>
            <a class="icon-container">
                <i class="fas fa-folder-open"></i>
                GLOBAL
            </a>
            <ul class="sub-navigation">
                <form action="{{ route('pdf.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>

        <li>
            <a class="icon-container"><i class="fas fa-folder-open"></i>Sistemas</a>
            <ul class="sub-navigation">
                <form action="{{ route('sistemas.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>

        <li>
            <a class="icon-container">
                <i class="fas fa-folder-open"></i>
                Contabilidad
            </a>
            <ul class="sub-navigation">
                <form action="{{ route('contabilidad.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>
    
    
    <li>
    <a class='icon-container'>
        <i class='fas fa-folder-open'></i>
        Procesos
    </a>
    <ul class='sub-navigation'>
        <form action='{{ route('Procesos.index') }}' method='GET'>
            <button type='submit' class='btn btn-danger'>PDFs</button>
        </form>
    </ul>
</li>
    <li>
    <a class='icon-container'>
        <i class='fas fa-folder-open'></i>
        Jose
    </a>
    <ul class='sub-navigation'>
        <form action='{{ route('Jose.index') }}' method='GET'>
            <button type='submit' class='btn btn-danger'>PDFs</button>
        </form>
    </ul>
</li></ul></aside>

