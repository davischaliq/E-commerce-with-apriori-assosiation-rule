$('#inputGroupFile01').on('change', function() {
    // Ambil nama file 
    var fileName = $('#inputGroupFile01').val().split('\\').pop();
    //replace the "Choose a file" label
    $('#inputGroupFile01').next('.custom-file-label').addClass("selected").html(fileName);
});