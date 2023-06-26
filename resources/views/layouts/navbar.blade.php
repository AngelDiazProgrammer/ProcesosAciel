@push('styles')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush


<div class="sidebar">
    <ul class="navigation">
      <li>
        <a href="{{ route('creador.creador') }}">Crear carpeta</a>
    </li>
        <li>
            <a>GLOBAL</a>
            <ul class="sub-navigation">
                <form action="{{ route('pdf.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>
        <li>
            <a href="#">Sistemas</a>
            <ul class="sub-navigation">
                <form action="{{ route('sistemas.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>
        <li>
            <a href="#">Contabilidad</a>
            <ul class="sub-navigation">
                <form action="{{ route('contabilidad.index') }}" method="GET">
                    <button type="submit" class="btn btn-danger">PDFs</button>
                </form>
            </ul>
        </li>
       <li>
        <a>gerencia</a>
        <ul class='sub-navigation'>
          <form action='{{ route('gerencia.index') }}' method='GET'>
            <button type='submit' class='btn btn-danger'>PDFs</button>
          </form>
        </ul>
      </li></ul></div>
