
$('.alpha').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z0-9\s \b]");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str))  {
          return true;
    }
      else
      {
      e.preventDefault();
      return false;
      }
  });

  $('.user').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z0-9\b \s \t /\ :\ .\ -\]");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str))  {
            return true;
      }
        else
        {
        e.preventDefault();
        return false;
        }
    });

  $('.letters').keypress(function (e) {
         var regex = new RegExp("^[a-zA-Z\b .\ ,\]$");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         else
         {
         e.preventDefault();
         return false;
         }
     });

      $('.alphabets').keypress(function (e) {
              var regex = new RegExp("^[a-zA-Z\s \b]$");
              var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
              if (regex.test(str)) {
                  return true;
              }
              else
              {
              e.preventDefault();
              return false;
              }
          });

$('.alphabets2').keypress(function (e) {
     var regex = new RegExp('^[0-9\b]$');
     var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
     if (regex.test(str)) {
         return true;
     }
     else
     {
     e.preventDefault();
     return false;
     }
 });
