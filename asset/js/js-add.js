 $(document).ready(function() {


        $('.dellall').click(function() { 


            if (confirm("Are you sure you want to delete this?")) {

                var id = [];

                var reload = [];

                $(':checkbox:checked').each(function(i) {

                    id[i] = $(this).val();

                });

                

                if (id.length === 0) {

                    alert("Please Select atleast one checkbox");

                } else {
                        console.log('id.length');
                    // ,     
                    // var url = '<?php echo base_url();?>index.php/categories/delete_multiple/';

                    $.ajax({
 
                        url: "<?php echo base_url();?>"+"categories/delete_multiple/",

                        method: 'POST',

                        data: {
                            id: id
                        },

                        success: function(events) {
                           console.log(id);

                            $('.selected').remove();

                        },
                        error: function(events) {
                            alert("that bai");
                        },

                    });

                }

            } else {

                return false;
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