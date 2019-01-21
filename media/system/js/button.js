
$(document).ready(function(){
  //при нажатию на любую кнопку, имеющую класс .btn
  $(".button1").click(function() {
    //открыть модальное окно с id="myModal"
    $("#myModal").modal('show');
  });
});