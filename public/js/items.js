var Total = 0;

function computeTotal() {

  Total = 0;

  $('.item-price').each(function(index, el) {

    var quantity = $("#quantity-item-" + $(this).attr('price-item-id')).val();

    var rate = $("#rate-item-" + $(this).attr('price-item-id')).val();

    quantity = quantity ? quantity : 0;
    rate = rate ? rate : 0;

    calculated = rate * quantity;

    $(this).val(parseFloat(calculated));

    Total += parseFloat(calculated);

  });



  $("#total-budget").val(Total);
  $("#total").html(Total)


  Total > 0 ? $('#borderless-row').show() : $('#borderless-row').hide();
}


function attachEvents() {
  $(".close").click(function(){
      var its = $(".close").length - 1;
    its > 1 ? $(this).parent().parent().remove() : '';
      computeTotal();
  });

  $("#send-budget").click(function(event) {
      computeTotal();
      $("#rtype").val('email');
      $("#remail").attr('name', 'email');
      $("#budget-form").submit();
  });

  $("#download-budget").click(function(event) {
      $("#rtype").val('download');
      $("#remail").attr('name', 'emailx');
      $("#budget-form").submit();
  });


  // Send();

  $(".item-price,.item-quantity").on('keyup change', function(event) {
    computeTotal();
  });


  $("#cpemail").on('keyup change', function() {
      $("#remail").val($(this).val());
  });

  $("#currency").change(function() {
    var currency = $(this).val();
    $("#dollar-sign").html(currency);
  });
}








$(document).ready(function(){
  // calculate();
    computeTotal();
    var items = 1;

    $(".butt").click(function(){
      $(".old,.new").toggle();
      attachEvents();
    });

    $("#add-btn").click(function(e){
        e.preventDefault();

        var item = $("#item-sample").html();
        item = item.replace(/--items/g, items);

        $("#div1").append(item);

        attachEvents();
        items++;
    });

    Total > 0 ? $('#borderless-row').show() : $('#borderless-row').hide();

    attachEvents();
});
