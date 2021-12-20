// $(document).ready(function()
// {
//     $("#eventid").change(function() {
//         if($(this).val() != "") {
//             $("#eventid").hide();
//         }
//         else {
//             $("#eventid").show();
//         }
//     });
// });

$(document).ready(function(){
			var rating_data = 0;
			function reset_background() {
				for (var i = 0; i <= 5; i++) {
					$('#submit_star_'+i).addClass('star_light');
					$('#submit_star_'+i).removeClass('text-warning');
				}
			}

			$(document).on('mouseenter', '.submit_star', function(){
				var rating = $(this).data('rating');
				reset_background();
				for (var i = 0; i < rating; i++) {
					$('#submit_star_'+i).addClass('text-warning');
				}
			});

			$(document).on('click', '.submit_star', function(){
				rating_data = $(this).data('rating');
				for (var i = 0; i < rating_data; i++) {
					$('#submit_star_'+i).addClass('text-warning');
				}
				// console.log(rating_data);
			});

            $(document).on('click', '#giverate', function(){
                var product_id = $(this).attr('data-id');
                    $('#ratingmodal').modal('show');
                        $('#fullname').attr('data-id', product_id);
                $(document).on('click', '#submit', function(){
                    var fullname = $('#fullname').val();
                    var comment = $('#comment').val();
                    var id = $('#fullname').attr('data-id');
                    if (fullname == '' || comment == '') {
                        alert("Tolong lengkapin input formnya");
                        return false;
                    }else {
                        $.ajax({
                            url: 'http://localhost/joki-nana/edit/edit.php?SentRate',
                            method: "POST",
                            data: {rating_data:rating_data, fullname:fullname, comment:comment, id:id},
                            success:function(data)
                            {
                    if (data > 0) {
                        $('#fullname').val('');
                        $('#comment').val('');
                        reset_background();
                        alert("Berhasil memberikan review");
                        window.location.reload();
                    }else {
                      alert("Gagal memberikan review", data);
                    }
                            }
                        })
                    }
                
                })
		    });

	});