<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Aide | Université Sesame</title>
    </head>
    @include("Layouts.body_configuration")
        <div id = "preloader">
            <div id = "status">
                <div class = "bouncing-loader">
                    <div></div><div></div><div></div>
                </div>
            </div>
        </div>
        <div class = "wrapper">
            @include("Layouts.left_navbar")
            <div class = "content-page">
                <div class = "content">
                    @include("Layouts.top_navbar")
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <ol class = "breadcrumb m-0">
                                            @include("Layouts.page_title_site")
                                            <li class = "breadcrumb-item active">Aide</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Aide</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Page d'aide</h4>
                                        <p class = "text-muted font-14">
                                            Vous avez des questions ? Vous cherchez des informations sur notre plate-forme ? Ici vous trouvez tout ce que vous avez besoin. Lisez attentivement les informations pour trouver ce que vous avez besoin.
                                        </p>
                                        <div class = "accordion custom-accordion" id = "custom-accordion-one">
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingOne">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseOne" aria-expanded = "true" aria-controls = "collapseOne">
                                                            Q. Université Sesame
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseOne" class = "collapse" aria-labelledby = "headingOne" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            L’Ecole Supérieure des Sciences Appliquées et de Management SESAME est un établissement privé de formation supérieure agréé par l'Etat tunisien (ministère de l'enseignement supérieur) et implanté dans le technopôle Elgazala
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingTwo">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseTwo" aria-expanded = "true" aria-controls = "collapseTwo">
                                                            Q. TIC et management : clé de succès
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseTwo" class = "collapse" aria-labelledby = "headingTwo" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            SESAME est une école d’ingénieurs en technologies de l’information et de la communication (TIC). Elle est aussi une école de management. Si elle a choisi cette double spécialisation, et donc de se différencier par rapport à d’autres écoles d’ingénieurs en Tunisie, c’est parce qu’elle considère que TIC et management constituent les piliers de la société de l’information et dont la bonne association conditionne fortement la réussite d’une entreprise.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingThree">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseThree" aria-expanded = "true" aria-controls = "collapseThree">
                                                            Q. Mission et objctifs
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseThree" class = "collapse" aria-labelledby = "headingThree" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Soucieuse d’offrir à ses étudiants les meilleures perspectives d’employabilité, SESAME a choisi de se positionner comme avant-gardiste en offrant à ses élèves la formation, l’ouverture et l’environnement appropriés. Son objectif est en effet de former des ingénieurs et des licenciés en informatique maîtrisant les concepts et les techniques les plus évolués et ayant les connaissances nécessaires en management. Elle vise également à offrir aux managers des connaissances en TIC leur permettant de mieux appréhender le monde dans lequel ils évoluent. Elle projette aussi de faire bénéficier ces deux populations d’étudiants de la double culture et de leur permettre de travailler en parfaite symbiose en partageant leurs connaissances et leurs expériences respectives.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingFour">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseFour" aria-expanded = "true" aria-controls = "collapseFour">
                                                            Q. Innover pour mieux former
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseFour" class = "collapse" aria-labelledby = "headingFour" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Pour réussir son pari pédagogique, SESAME a adopté la formule « innover pour mieux former ». L’innovation se situe à trois niveaux : le niveau de l’offre, le niveau pédagogique et le niveau de l’environnement technologique. L’offre de SESAME comporte une filière Informatique et une filière management, chacune d’entre elles se déclinant en différentes spécialités selon les cursus ingéniorat, licence et mastère dont, entre autres, « Ingénierie Informatique », « Systèmes Embarqués », « Distribution et Trade marketing », « Logistique, Achats et Echanges Internationaux ».
                                                            Au niveau pédagogique, SESAME propose des programmes de formation donnant une priorité au travail en équipe, à l’esprit d’initiative et à l’entrepreneuriat. Le cursus englobe aussi des activités transversales dans lesquelles l’étudiant devient un élément actif qui donne libre cours à son imagination, à sa créativité et à son initiative. Les projets et les stages prévus dans le cursus permettent aux étudiants de s’imprégner du monde de l’entreprise.
                                                            Au niveau technologique, SESAME s’appuie sur un environnement de travail High Tech : un nouveau bâtiment équipé des dernières technologies, une connectique de haut débit et une liaison à l’Internet par fibre optique. Elle est dotée aussi d’une plateforme de ressources informatiques de dernière génération utilisant les concepts les plus avancés de la virtualisation et du cloud computing. Ainsi, l’étudiant sera familiarisé avec les systèmes et équipements vers lesquels les entreprises sont entrain de migrer.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingFive">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseFive" aria-expanded = "true" aria-controls = "collapseFive">
                                                            Q. Accompagner les professionnes tout au long de leur vie active
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseFive" class = "collapse" aria-labelledby = "headingFive" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Riche de la grande expérience de son équipe dirigeante, de celle des enseignants, des professionnels auxquels elle fait appel et des grands moyens qu’elle met en œuvre, SESAME ambitionne aussi d’accompagner les professionnels tout au long de leur vie active. A cet effet, elle propose à ces derniers des formations continues, des certifications et des séminaires leur permettant d’être au diapason des évolutions de leurs secteurs respectifs et de s’approprier les avancées techniques et technologiques.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingSix">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseSix" aria-expanded = "true" aria-controls = "collapseSix">
                                                            Q. Mobiliser un corps enseignant de haut niveau
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseSix" class = "collapse" aria-labelledby = "headingSix" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            En plus d’un corps enseignant composé d’enseignants permanents dans ses deux disciplines informatique et management, SESAME s’appuie sur un réseau d’enseignants universitaires et de professionnels tunisiens de grande qualité. Elle fait appel en plus à des enseignants de grandes écoles et d’universités étrangères comme le CNAM (Paris), Télécom Sud Paris (Evry), Télécom Ecole de Management (Evry), l’École Internationale des Sciences du Traitement de l’Information EISTI (Paris), Edinburgh Napier University (UK).
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingSeven">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseSeven" aria-expanded = "true" aria-controls = "collapseSeven">
                                                            Q. Assurer l'employabilité de ses diplômés
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseSeven" class = "collapse" aria-labelledby = "headingSeven" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Une formation de qualité qui prend en considération les avancées technologiques, développe la capacité de l’étudiant à communiquer en plusieurs langues, à travailler en groupe, à prendre des initiatives et à innover, permettra à SESAME de mettre sur le marché de l’emploi des diplômés convoités par les entreprises. Notre approche de la proximité, dans le cadre des stages et de projets collaboratifs entre l’école et les entreprises, est un atout d’employabilité particulièrement significatif car les entreprises connaîtront nos futurs diplômés avant même l’achèvement leurs études.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingEight">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseEight" aria-expanded = "true" aria-controls = "collapseEight">
                                                            Q. Développer les compétences sociales
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseEight" class = "collapse" aria-labelledby = "headingEight" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            SESAME ambitionne de voir ses ingénieurs et ses managers se positionner en tant que leaders dans de nombreux secteurs d’activités et de saisir au mieux les opportunités offertes par le marché de l’emploi. Pour cette raison et convaincue qu’au-delà des compétences techniques, le développement de la personnalité de l’individu et l’acquisition de compétences sociales sont des facteurs clés pour atteindre cet objectif, SESAME encourage ses étudiants à s’engager dans des activités culturelles et associatives. Les espaces dédiés dès à présent pour ce type d’activités permettent à ces derniers de se réaliser autrement et d’acquérir des qualités essentielles pour bien s’intégrer dans le monde du travail.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingNine">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseNine" aria-expanded = "true" aria-controls = "collapseNine">
                                                            Q. Formations disponibles
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseNine" class = "collapse" aria-labelledby = "headingNine" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            <h3>• Formation Initiale</h3>
                                                            <p class = "mx-4">• Classes préparatoires</p>
                                                            <p class = "mx-4">• Cycle ingénieur</p>
                                                            <p class = "mx-4">• Licence Multimédia</p>
                                                            <p class = "mx-4">• Licence Management</p>
                                                            <p class = "mx-4">• Master Management</p>
                                                            <p class = "mx-4">• Master International en Management</p>
                                                            <h3>• Formation en Temps Aménagé</h3>
                                                            <p class = "mx-4">• Cycle Ingénieur</p>
                                                            <p class = "mx-4">• Master Professionnel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingTen">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseTen" aria-expanded = "true" aria-controls = "collapseTen">
                                                            Q. Contact de l'Université Sesame
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseTen" class = "collapse" aria-labelledby = "headingTen" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Pour contacter l'Université Sesame vous pouvez :<br>
                                                            • Naviguer sur note site web <strong><a href = "https://universitesesame.com/">Université Sesame</a></strong><br>
                                                            • Envoyez-nous un e-mail sur <strong>sesame@sesame.com.tn</strong><br>
                                                            • Appelez le numéro <strong> (+ 216) 70 686 486</strong> ou <strong> 97 397 292</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class = "footer">
                @include("Layouts.footer_site")
            </footer>
            @include("Layouts.right_navbar_site")
        </div>
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>