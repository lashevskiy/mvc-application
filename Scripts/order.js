/**
 * Created by lashevskiy on 17.09.2015.
 */

$(document).ready(function(){
    $(".qwerty").click(function(){
        $(this).hide();
    });


    $('.button-add').click(function() {
        var orderPrice = $('#orderPrice').attr("orderPrice");
        var orderCount = $('#orderCount').attr("orderCount");
        var totalPrice = $('#orderPrice').attr("orderPrice");
        var bookPrice = $(this).attr("bookPrice");
        var bookId = $(this).attr("bookId");

        var newPrice = Number(orderPrice) + Number(bookPrice);

        orderCount++;

        $('#orderCount').html(orderCount);
        $('#orderPrice').html(newPrice);
        $('#orderPrice').attr("orderPrice", newPrice);
        $('#orderCount').attr("orderCount", orderCount);


        $(document).mousemove(function(pos) {
            $('.orderMessage').css('position', 'absolute').css('left', (pos.pageX+30)+'px').css('top', (pos.pageY+50)+'px').css('font-weight', '700').css('color', '#89ca18');
        });


        $('.orderMessage').html("Добавлено").show();


        /*alert(orderCount);*/


        $.ajax({
            url: "/Application/Models/AddOrderModel.php",
            type: 'POST',
            data: { bookId: bookId, bookPrice: bookPrice},
            async: false,
            success: function(data) {
                /*alert("Data Loaded: " + data);*/
                /*$( ".result" ).html( data );*/
                $('.orderMessage').html("Добавлено");
                setTimeout('$(".orderMessage").hide();', 500);

            }
        });
        /*$.post("Application/Models/AddOrderModel.php", { 'choices[]': ["Jon", "Susan"]} );*/


    });




});

