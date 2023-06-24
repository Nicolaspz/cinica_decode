
$(document).ready(function() {
    var data=$('#date');
    var medico=$('#medico');
    var hoursAfternoon;
    var hoursMorning;
    var titleAfternoon;
    var titleMorning;
    let iRadio;
    const TitleMorning="Turno da Manhã";
    const TitleAfetrnoon="Turno da Tarde";
    const NoHours=` <div class="text-danger">
    Não ha hora disponível
    </div>`;


  const $especialidade = $('#especialidade');
  hoursAfternoon=$('#hoursAfternoon');
    hoursMorning=$('#hoursMorning');
    titleAfternoon=$('#titleAfternoon');
    titleMorning=$('#titleMorning');
  $especialidade.change(function() {

      var id = $(this).val();
      var url = '/especilidd_doctors/' + id;
      //alert(id);

      $.ajax({
          url: url,
          type: 'GET',
      }).done(function(response) {
        //console.log("Ola pessoal");
          let thmlOptions='';
          var doctor=$('#medico');
          doctor.empty();
          var option = $("<option>")
                  .val("")
                  .text("selecione um médico");
                  doctor.append(option);
          $.each(response.tickets, function(index, ticket) {
              var option = $("<option>")
                  .val(ticket.id)
                  .text(ticket.name);
                  doctor.append(option);
          });

          medico.change(loadHours);
          data.change(loadHours);

      }).fail(function(xhr, status, error) {
          console.log('Erro na requisição');
          console.log(xhr);
          console.log(status);
          console.log(error);
      });
  });

  function loadHours(){
    const selectDate=data.val();
    const Selectmedico=medico.val();


    const url ='/horario/horas';
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            date: selectDate,
            medico_id: Selectmedico
        },
    }).done(function(response) {
       let htmlHoursM='';
       let htmlHoursA='';
       //console.log(response.morning);
       iRadio=0;
       if(response.morning){
        const morning_intervalo = response.morning;
        morning_intervalo.forEach(intervalo=>{
            htmlHoursM+=getRadioIntervalo(intervalo);
            //console.log(intervalo);
        });
       }
       if(!htmlHoursM != ""){
        htmlHoursM += NoHours;
    }
       if(response.afternoon){
        const afternoon_intervalo = response.afternoon;
        afternoon_intervalo.forEach(intervalo=>{
            htmlHoursA+=getRadioIntervalo(intervalo);
            //console.log("afternoon-" +intervalo);
        });

       }
       if(!htmlHoursA != ""){
        htmlHoursA += NoHours;
    }

       hoursAfternoon.html(htmlHoursA);
        hoursMorning.html(htmlHoursM);
        titleAfternoon.html(TitleAfetrnoon);
        titleMorning.html(TitleMorning);

    }).fail(function(xhr, status, error){
        console.log('Erro na requisição');
        console.log(xhr);
        console.log(status);
        console.log(error);
    });
  }

  function getRadioIntervalo(intervalo){
   const text = intervalo.start + " - " + intervalo.end;
   return `<div class="custom-control custom-radio mb-3">
   <input type="radio" id="interva${iRadio}" name="sheduled_time" class="custom-control-input" value="${intervalo.start}" required>
   <label class="custom-control-label" for="interva${iRadio++}">${text}</label>
 </div>`
  }



});
