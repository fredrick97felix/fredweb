$(document).ready(function(){
  
      $("#color").select2({
        multiple: true,
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        ajax: { 
            url: "Geticd10.php",
            type: "POST",
            dataType: 'json',
            data: function (params) {
              return {
                searchTerm: params.term // search term
              };
            },
            processResults: function (data) {
              return {
                  results: $.map(data, function (item) {
                    var code=item.code+'-'+ item.WHO_full_description;
                      return {
                          text: code,
                          id: item.id
                      }
                  })
              };
            },

            cache: true
             
          }  
      }); 
      
  //     $("#color").on('select2:select', function (e) {
  //   var data = e.params.data;
  //   console.log(data);
  //  });
 
    });
