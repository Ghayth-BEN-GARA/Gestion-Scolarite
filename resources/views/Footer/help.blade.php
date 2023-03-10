<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Aide | Universit√© Sesame</title>
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
                                                            Q. Universit√© Sesame
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseOne" class = "collapse" aria-labelledby = "headingOne" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            L‚ÄôEcole Sup√©rieure des Sciences Appliqu√©es et de Management SESAME est un √©tablissement priv√© de formation sup√©rieure agr√©√© par l'Etat tunisien (minist√®re de l'enseignement sup√©rieur) et implant√© dans le technop√īle Elgazala
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingTwo">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseTwo" aria-expanded = "true" aria-controls = "collapseTwo">
                                                            Q. TIC et management : cl√© de succ√®s
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseTwo" class = "collapse" aria-labelledby = "headingTwo" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            SESAME est une √©cole d‚Äôing√©nieurs en technologies de l‚Äôinformation et de la communication (TIC). Elle est aussi une √©cole de management. Si elle a choisi cette double sp√©cialisation, et donc de se diff√©rencier par rapport √† d‚Äôautres √©coles d‚Äôing√©nieurs en Tunisie, c‚Äôest parce qu‚Äôelle consid√®re que TIC et management constituent les piliers de la soci√©t√© de l‚Äôinformation et dont la bonne association conditionne fortement la r√©ussite d‚Äôune entreprise.
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
                                                            Soucieuse d‚Äôoffrir √† ses √©tudiants les meilleures perspectives d‚Äôemployabilit√©, SESAME a choisi de se positionner comme avant-gardiste en offrant √† ses √©l√®ves la formation, l‚Äôouverture et l‚Äôenvironnement appropri√©s. Son objectif est en effet de former des ing√©nieurs et des licenci√©s en informatique ma√ģtrisant les concepts et les techniques les plus √©volu√©s et ayant les connaissances n√©cessaires en management. Elle vise √©galement √† offrir aux managers des connaissances en TIC leur permettant de mieux appr√©hender le monde dans lequel ils √©voluent. Elle projette aussi de faire b√©n√©ficier ces deux populations d‚Äô√©tudiants de la double culture et de leur permettre de travailler en parfaite symbiose en partageant leurs connaissances et leurs exp√©riences respectives.
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
                                                            Pour r√©ussir son pari p√©dagogique, SESAME a adopt√© la formule ¬ę innover pour mieux former ¬Ľ. L‚Äôinnovation se situe √† trois niveaux : le niveau de l‚Äôoffre, le niveau p√©dagogique et le niveau de l‚Äôenvironnement technologique. L‚Äôoffre de SESAME comporte une fili√®re Informatique et une fili√®re management, chacune d‚Äôentre elles se d√©clinant en diff√©rentes sp√©cialit√©s selon les cursus ing√©niorat, licence et mast√®re dont, entre autres, ¬ę Ing√©nierie Informatique ¬Ľ, ¬ę Syst√®mes Embarqu√©s ¬Ľ, ¬ę Distribution et Trade marketing ¬Ľ, ¬ę Logistique, Achats et Echanges Internationaux ¬Ľ.
                                                            Au niveau p√©dagogique, SESAME propose des programmes de formation donnant une priorit√© au travail en √©quipe, √† l‚Äôesprit d‚Äôinitiative et √† l‚Äôentrepreneuriat. Le cursus englobe aussi des activit√©s transversales dans lesquelles l‚Äô√©tudiant devient un √©l√©ment actif qui donne libre cours √† son imagination, √† sa cr√©ativit√© et √† son initiative. Les projets et les stages pr√©vus dans le cursus permettent aux √©tudiants de s‚Äôimpr√©gner du monde de l‚Äôentreprise.
                                                            Au niveau technologique, SESAME s‚Äôappuie sur un environnement de travail High Tech : un nouveau b√Ętiment √©quip√© des derni√®res technologies, une connectique de haut d√©bit et une liaison √† l‚ÄôInternet par fibre optique. Elle est dot√©e aussi d‚Äôune plateforme de ressources informatiques de derni√®re g√©n√©ration utilisant les concepts les plus avanc√©s de la virtualisation et du cloud computing. Ainsi, l‚Äô√©tudiant sera familiaris√© avec les syst√®mes et √©quipements vers lesquels les entreprises sont entrain de migrer.
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
                                                            Riche de la grande exp√©rience de son √©quipe dirigeante, de celle des enseignants, des professionnels auxquels elle fait appel et des grands moyens qu‚Äôelle met en Ňďuvre, SESAME ambitionne aussi d‚Äôaccompagner les professionnels tout au long de leur vie active. A cet effet, elle propose √† ces derniers des formations continues, des certifications et des s√©minaires leur permettant d‚Äô√™tre au diapason des √©volutions de leurs secteurs respectifs et de s‚Äôapproprier les avanc√©es techniques et technologiques.
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
                                                            En plus d‚Äôun corps enseignant compos√© d‚Äôenseignants permanents dans ses deux disciplines informatique et management, SESAME s‚Äôappuie sur un r√©seau d‚Äôenseignants universitaires et de professionnels tunisiens de grande qualit√©. Elle fait appel en plus √† des enseignants de grandes √©coles et d‚Äôuniversit√©s √©trang√®res comme le CNAM (Paris), T√©l√©com Sud Paris (Evry), T√©l√©com Ecole de Management (Evry), l‚Äô√Čcole Internationale des Sciences du Traitement de l‚ÄôInformation EISTI (Paris), Edinburgh Napier University (UK).
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingSeven">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseSeven" aria-expanded = "true" aria-controls = "collapseSeven">
                                                            Q. Assurer l'employabilit√© de ses dipl√īm√©s
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseSeven" class = "collapse" aria-labelledby = "headingSeven" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Une formation de qualit√© qui prend en consid√©ration les avanc√©es technologiques, d√©veloppe la capacit√© de l‚Äô√©tudiant √† communiquer en plusieurs langues, √† travailler en groupe, √† prendre des initiatives et √† innover, permettra √† SESAME de mettre sur le march√© de l‚Äôemploi des dipl√īm√©s convoit√©s par les entreprises. Notre approche de la proximit√©, dans le cadre des stages et de projets collaboratifs entre l‚Äô√©cole et les entreprises, est un atout d‚Äôemployabilit√© particuli√®rement significatif car les entreprises conna√ģtront nos futurs dipl√īm√©s avant m√™me l‚Äôach√®vement leurs √©tudes.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingEight">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseEight" aria-expanded = "true" aria-controls = "collapseEight">
                                                            Q. D√©velopper les comp√©tences sociales
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseEight" class = "collapse" aria-labelledby = "headingEight" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            SESAME ambitionne de voir ses ing√©nieurs et ses managers se positionner en tant que leaders dans de nombreux secteurs d‚Äôactivit√©s et de saisir au mieux les opportunit√©s offertes par le march√© de l‚Äôemploi. Pour cette raison et convaincue qu‚Äôau-del√† des comp√©tences techniques, le d√©veloppement de la personnalit√© de l‚Äôindividu et l‚Äôacquisition de comp√©tences sociales sont des facteurs cl√©s pour atteindre cet objectif, SESAME encourage ses √©tudiants √† s‚Äôengager dans des activit√©s culturelles et associatives. Les espaces d√©di√©s d√®s √† pr√©sent pour ce type d‚Äôactivit√©s permettent √† ces derniers de se r√©aliser autrement et d‚Äôacqu√©rir des qualit√©s essentielles pour bien s‚Äôint√©grer dans le monde du travail.
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
                                                            <h3>‚ÄĘ Formation Initiale</h3>
                                                            <p class = "mx-4">‚ÄĘ Classes pr√©paratoires</p>
                                                            <p class = "mx-4">‚ÄĘ Cycle ing√©nieur</p>
                                                            <p class = "mx-4">‚ÄĘ Licence Multim√©dia</p>
                                                            <p class = "mx-4">‚ÄĘ Licence Management</p>
                                                            <p class = "mx-4">‚ÄĘ Master Management</p>
                                                            <p class = "mx-4">‚ÄĘ Master International en Management</p>
                                                            <h3>‚ÄĘ Formation en Temps Am√©nag√©</h3>
                                                            <p class = "mx-4">‚ÄĘ Cycle Ing√©nieur</p>
                                                            <p class = "mx-4">‚ÄĘ Master Professionnel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingTen">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseTen" aria-expanded = "true" aria-controls = "collapseTen">
                                                            Q. Contact de l'Universit√© Sesame
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseTen" class = "collapse" aria-labelledby = "headingTen" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Pour contacter l'Universit√© Sesame vous pouvez :<br>
                                                            ‚ÄĘ Naviguer sur note site web <strong><a href = "https://universitesesame.com/">Universit√© Sesame</a></strong><br>
                                                            ‚ÄĘ Envoyez-nous un e-mail sur <strong>sesame@sesame.com.tn</strong><br>
                                                            ‚ÄĘ Appelez le num√©ro <strong> (+ 216) 70 686 486</strong> ou <strong> 97 397 292</strong>
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