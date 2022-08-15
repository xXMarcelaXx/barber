document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev',
        center: 'title',
        right: 'next, month'
      },

      navLinks: true,
      editable: true,
      weekends: false,



      dateClick: function(info) {
        var actual = new Date();
      if(info.date >= actual){
        info.dayEl.style.backgroundColor = "yellow";
        $("#exampleModal").modal();
        document.getElementById("dia").innerHTML= info.dateStr;
      }else{
        alert("Error: No se puede solicitar una cita en una fecha vencida");
      }
}
    });

    calendar.render();
    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        document.getElementById('agendar').disabled=false;

       }
