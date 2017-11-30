$(document).ready(function() {

    $('.dellall').click(function() {

        var id = [];

        var reload = [];

        $(':checkbox:checked').each(function(i) {

            id[i] = $(this).val();

        });

        if (id.length === 0) {

            $(".btn-can").click();

            $(".checkxxx").click();
          
        } else {

            $.ajax({

                url: baseURL+'sinhvien/delete_checkbox/',

                method: 'POST',

                data: {

                    id: id
                    
                },

                success: function(data) {

                    data = JSON.parse(data);

                    $(".Members.selected").remove();

                    $(".User.selected").remove();

                    $('#Delete .messStudent').text(data.message);

                    $(".Delete").click();              

                    $(".btn-can").click();

                },
                
                error: function(events) {

                    alert("that bai");

                },

            });

        }

    });

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