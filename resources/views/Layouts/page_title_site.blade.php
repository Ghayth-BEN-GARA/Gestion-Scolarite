@if(Session()->get("acteur") == "Admin")
    <li class = "breadcrumb-item">
        <a href = "{{url('/dashboard-admin')}}">Accueil</a>
    </li>
@elseif(Session()->get("acteur") == "Comptable")
    <li class = "breadcrumb-item">
        <a href = "{{url('/dashboard-comptable')}}">Accueil</a>
    </li>
@elseif(Session()->get("acteur") == "Enseignant")
    <li class = "breadcrumb-item">
        <a href = "{{url('/dashboard-enseignant')}}">Accueil</a>
    </li>
@elseif(Session()->get("acteur") == "Etudiant")
    <li class = "breadcrumb-item">
        <a href = "{{url('/dashboard-etudiant')}}">Accueil</a>
    </li>
@elseif(Session()->get("acteur") == "Parent")
    <li class = "breadcrumb-item">
        <a href = "{{url('/dashboard-parent')}}">Accueil</a>
    </li>
@endif