$(document).ready(function()
{
  var active = false;

  $(".btn_gauche").click(function()
  {
    var id = $(this).attr("id");
    id = id.substr(8);

    $("#synopsis-resume"+id).slideUp("slow");
    $("#synopsis-entier"+id).slideDown("slow");

    $("#info"+id).slideDown("slow");

    if(active == false)
    {
      active = true;
      $(this).text("REDUIRE");
    }
    else {
      active = false;
      $(this).text("VOIR PLUS");
      $("#synopsis-resume"+id).slideDown("slow");
      $("#synopsis-entier"+id).slideUp("slow");

      $("#info"+id).slideUp("slow");
    }

    preventDefault();
    return false;
  });

  $(".btn_droite").click(function()
  {
    var id = $(this).attr("id");
    id = id.substr(8);

    $("#synopsis-resume"+id).slideUp("slow");
    $("#synopsis-entier"+id).slideDown("slow");

    $("#info"+id).slideDown("slow");

    if(active == false)
    {
      active = true;
      $(this).text("REDUIRE");
    }
    else {
      active = false;
      $(this).text("VOIR PLUS");
      $("#synopsis-resume"+id).slideDown("slow");
      $("#synopsis-entier"+id).slideUp("slow");

      $("#info"+id).slideUp("slow");
    }

    preventDefault();
    return false;
  });
});
