<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <link rel = "stylesheet" href = "{{asset('/css/vendor/fullcalendar.min.css')}}">
        <title>Planning | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Planning</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Planning</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <div class = "row">
                                            <div class = "col-lg-3">
                                                <div class = "d-grid">
                                                    <a href = "{{url('/add-seance-enseignant')}}" class = "btn btn-lg font-16 btn-primary">
                                                        <i class = "mdi mdi-plus-circle-outline"></i>
                                                        Créer une séance
                                                    </a>
                                                </div>
                                                <div id = "external-events" class = "m-t-20">
                                                    <br>
                                                    <p class = "text-muted">Pour la planification des séances, les états des cours sont bien précisés.</p>
                                                    <div class = "bg-event bg-danger-lighten text-danger" data-class = "bg-danger">
                                                        <i class = "mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>
                                                        Séance terminée
                                                    </div>
                                                    <div class = "bg-event bg-success-lighten text-success" data-class = "bg-success">
                                                        <i class = "mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>
                                                        Séance d'aujourd'hui
                                                    </div>
                                                    <div class = "bg-event bg-secondary-lighten text-secondary" data-class = "bg-secondary">
                                                        <i class = "mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>
                                                        Séance à venir
                                                    </div>
                                                </div>
                                                <div class = "mt-5 d-none d-xl-block">
                                                    <h5 class = "text-center">Comment ça fonctionne ?</h5>
                                                    <ul class = "ps-3">
                                                        <li class = "text-muted mb-3">
                                                            La création des nouvelles séances se fait aprés le clique sur le bouton créer une séance.
                                                        </li>
                                                        <li class = "text-muted mb-3">
                                                            La consultation des informations de la séance se fait après le clic sur l'événement choisi dans la calendrier.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class = "col-lg-9">
                                                <div class = "mt-4 mt-lg-0">
                                                    <div id = "calendar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "modal fade" id = "event-modal" tabindex = "-1">
                                    <div class = "modal-dialog">
                                        <div class = "modal-content">
                                            <form class = "needs-validation" name = "event-form" id = "form-event">
                                                <div class = "modal-header py-3 px-4 border-bottom-0">
                                                    <h5 class = "modal-title" id = "modal-title">Informations</h5>
                                                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                                                </div>
                                                <div class = "modal-body px-4 pb-4 pt-0">
                                                    <div class = "row">
                                                        <div class = "col-12">
                                                            <div class = "mb-3">
                                                                <label class = "control-label form-label">Séance</label>
                                                                <input class = "form-control" type = "text" name = "title" id = "event-title" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-12 text-end">
                                                            <button type = "button" class = "btn btn-primary me-1" data-bs-dismiss = "modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
        <script src = "{{asset('/js/vendor/fullcalendar.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                !(function (l) {
                    "use strict";
                    function e() {
                        (this.$body = l("body")),
                        (this.$modal = new bootstrap.Modal(document.getElementById("event-modal"),
                        { backdrop: "static" }
                    )),
                    (this.$calendar = l("#calendar")),
                    (this.$formEvent = l("#form-event")),
                    (this.$btnNewEvent = l("#btn-new-event")),
                    (this.$btnDeleteEvent = l("#btn-delete-event")),
                    (this.$btnSaveEvent = l("#btn-save-event")),
                    (this.$modalTitle = l("#modal-title")),
                    (this.$calendarObj = null),
                    (this.$selectedEvent = null),
                    (this.$newEventData = null);
                }

                (e.prototype.onEventClick = function (e) {
                    this.$formEvent[0].reset(),
                    this.$formEvent.removeClass("was-validated"),
                    (this.$newEventData = null),
                    this.$btnDeleteEvent.show(),
                    this.$modalTitle.text("Edit Event"),
                    this.$modal.show(),
                    (this.$selectedEvent = e.event),
                    l("#event-title").val(this.$selectedEvent.title),
                    l("#event-category").val(this.$selectedEvent.classNames[0]);
                }),

                (e.prototype.init = function () {
                    var e = new Date(l.now());
                    new FullCalendar.Draggable(
                        document.getElementById("external-events"),
                        {
                            itemSelector: ".external-event",
                            eventData: function (e) {
                                return {
                                    title: e.innerText,
                                    className: l(e).data("class"),
                                };
                            },
                        }
                    );
                    var t = @json($events),

                    a = this;
                    (a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                        slotDuration: "00:15:00",
                        slotMinTime: "08:00:00",
                        slotMaxTime: "17:00:00",
                        themeSystem: "bootstrap",
                        bootstrapFontAwesome: !1,
                        buttonText: {
                            today: "Today",
                            month: "Month",
                            week: "Week",
                            day: "Day",
                            list: "List",
                            prev: "Prev",
                            next: "Next",
                        },
                        initialView: "dayGridMonth",
                        handleWindowResize: !0,
                        height: l(window).height() - 200,
                        headerToolbar: {
                            left: "prev,next today",
                            center: "title",
                            right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                        },
                        initialEvents: t,
                        editable: !0,
                        droppable: !0,
                        selectable: !0,
                        dateClick: function (e) {
                            a.onSelect(e);
                        },
                        eventClick: function (e) {
                            a.onEventClick(e);
                        },
                    })),
                    a.$calendarObj.render(),
                    a.$btnNewEvent.on("click", function (e) {
                        a.onSelect({ date: new Date(), allDay: !0 });
                    }),
                    a.$formEvent.on("submit", function (e) {
                    e.preventDefault();
                    var t,n = a.$formEvent[0];
                    n.checkValidity()
                        ? (a.$selectedEvent
                              ? (a.$selectedEvent.setProp(
                                    "title",
                                    l("#event-title").val()
                                ),
                                a.$selectedEvent.setProp("classNames", [
                                    l("#event-category").val(),
                                ]))
                              : ((t = {
                                    title: l("#event-title").val(),
                                    start: a.$newEventData.date,
                                    allDay: a.$newEventData.allDay,
                                    className: l("#event-category").val(),
                                }),
                                a.$calendarObj.addEvent(t)),
                          a.$modal.hide())
                        : (e.stopPropagation(),
                        n.classList.add("was-validated"));
                    }),
                    l(
                        a.$btnDeleteEvent.on("click", function (e) {
                            a.$selectedEvent &&
                                (a.$selectedEvent.remove(),
                                (a.$selectedEvent = null),
                                a.$modal.hide());
                        })
                    );
                }),
                (l.CalendarApp = new e()),
                (l.CalendarApp.Constructor = e);
            })(window.jQuery),(function () {
                "use strict";
                window.jQuery.CalendarApp.init();
            })();
            });

        </script>
    </body>
</html>