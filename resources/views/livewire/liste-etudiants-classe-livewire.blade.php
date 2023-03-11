<div>
    <div class = "table-responsive">
        <table class = "table table-borderless table-centered mb-0">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Étudiant</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    @if(Session()->get("acteur") == "Admin")
                        <th style = "width: 50px;"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if($this->getCountEtudiants($etudiants) > 0)
                    <?php $i = 1; ?>
                    @foreach(explode(',', $etudiants) as $data) 
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td>
                                <img src = "{{URL::asset($this->getInformationsEtudiants($data)->getPathPhotoProfileUserAttribute())}}" alt = "Photo de profil" title = "{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}" class = "rounded-circle me-3" height = "40" width = "40">
                                <p class = "m-0 d-inline-block align-middle font-14">
                                    <a href = "{{url('user?id_user='.$data)}}" class = "text-body">{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}</a>
                                    <br>
                                    <small class = "me-2"><b>Genre :</b> {{$this->getInformationsEtudiants($data)->getGenreUserAttribute()}} </small>
                                </p>
                            </td>
                            <td>
                                {{$this->getInformationsEtudiants($data)->getEmailUserAttribute()}}
                            </td>
                            <td>
                                {{$this->getInformationsEtudiants($data)->getFormattedMobile2UserAttribute()}}
                            </td>
                            @if(Session()->get("acteur") == "Admin")
                                <td>
                                    <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerEtudiant({{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}, {{$id_classe}})"> 
                                        <i class = "mdi mdi-delete"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "5" class = "text-center">Aucun étudiant actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
