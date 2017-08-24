         var base_url = '<?php echo base_url(); ?>';
$(document).ready(function() {

    $('.dellall').click(function() { 

        var id = [];

        var reload = [];

        $(':checkbox:checked').each(function(i) {

            id[i] = $(this).val();

        });

        if (id.length === 0) {

            $('.dell-11').click();

            $(".btn-can").click();

        } else {

                console.log('id.length');

            $.ajax({

                url: baseURL+"categories/delete_multiple",

                method: 'POST',

                data: {

                    id: id
                
                },

                success: function(events) {

                    $('.selected').not('.1').remove();
                    
                    $(".btn-can").click();

                    $(".Delete").click();

                },

                error: function(events) {

                    alert("that bai");

                },

            });

        }   

    });

});

$(document).ready(function() {

    $('.checkAll').on('click', function() {

        $(this).closest('table').find('tbody :checkbox')

        .prop('checked', this.checked)

        .closest('tr').toggleClass('selected', this.checked);

    });

    $('tbody :checkbox').on('click', function() {

        $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row

        $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll

    });

});