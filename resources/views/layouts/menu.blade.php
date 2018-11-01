<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('stories*') ? 'active' : '' }}">
    <a href="{!! route('stories.index') !!}"><i class="fa fa-edit"></i><span>Historias</span></a>
</li>



<li class="{{ Request::is('sections*') ? 'active' : '' }}">
    <a href="{!! route('sections.index') !!}"><i class="fa fa-edit"></i><span>Secciones</span></a>
</li>