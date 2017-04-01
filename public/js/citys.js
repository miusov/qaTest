$.ajax({
    url: 'includes/getAreasCitys.php',
    type: 'POST',
    data: 'action=getAreas',
    success: function(data) {
        data = JSON.parse(data);
        var s = '<select id="areas" name="areas">';
        s+='<option></option>';
        for(var i=0; i<data.data.length; i++){
            s+='<option id="'+data.data[i].Ref+'" value="'+data.data[i].Description+'">'+data.data[i].Description+'</option>';
        }
        s+='</select>';
        $('.areas').after(s);
    }
})

$('body').on('change', 'select#areas', function() {
    $('#Warehouses').remove();
    $('#cities').remove();
    $.ajax({
        url: 'includes/getAreasCitys.php',
        type: 'POST',
        data: 'action=getCities',
        success: function(data) {
            data = JSON.parse(data);
            var s = '<select id="cities" name="cities">';
            for(var i=0; i<data.data.length; i++){
                if (data.data[i].Area==$('#areas option:selected').attr("id")) {
                    s+='<option value="'+data.data[i].DescriptionRu+'">'+data.data[i].DescriptionRu+'</option>';
                }}
            s+='</select>';
            $('.cities').after(s);
        }
    })

})

