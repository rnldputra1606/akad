$(document).ready(function() {

    $('select[name="kecamatan"]').on('change', function(){
        var idKecamatan = $(this).val();
        if(idKecamatan) {
            $.ajax({
                url: '/kelurahan/get/'+idKecamatan,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="kelurahan"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="kelurahan"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kelurahan"]').empty();
        }

    });

});
