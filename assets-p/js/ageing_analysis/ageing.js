
      function ageing_analysis() 
      {
        $('.analysis1').show();
        $('.analysis2').show();

        $('#0-30').show();
        $('#31-60').show();
        $('#61-90').show();
        $('#90-120').show();
        $('#120').show();
        
        $('#from1').show();
        $('#to1').show();
        $('#go').show();
      }

      function to_value1()
      {
        var from_val = $('#from1').val();
        var to_val = $('#to1').val();
        if(parseInt(to_val) < parseInt(from_val))
        {
          $('#to1').val(0);
        }
        else
        {
          $('#from2').show();
          $('#to2').show();
          var val = parseInt(to_val) + 1;
          $('#from2').val(val);
          $('#from2').attr('readonly','readonly');
          $('#to2').focus();

        }
      }
      function to_value2()
      {
       var from_val = $('#from2').val();
        var to_val = $('#to2').val();
        if(parseInt(to_val) < parseInt(from_val))
        {
          $('#to2').val(0);
        }
        else
        {
          $('#from3').show();
          $('#to3').show();
          var val = parseInt(to_val) + 1;
          $('#from3').val(val);
          $('#from3').attr('readonly','readonly');
          $('#to3').focus();

        }
      }
      function to_value3()
      {
       var from_val = $('#from3').val();
        var to_val = $('#to3').val();
        if(parseInt(to_val) < parseInt(from_val))
        {
          $('#to3').val(0);
        }
        else
        {
          $('#from4').show();
          $('#to4').show();
          var val = parseInt(to_val) + 1;
          $('#from4').val(val);
          $('#from4').attr('readonly','readonly');
          $('#to4').focus();

        }
      }
      function to_value4()
      {
       var from_val = $('#from4').val();
        var to_val = $('#to4').val();
        if(parseInt(to_val) < parseInt(from_val))
        {
          $('#to4').val(0);
        }
        else
        {
          $('#from5').show();
          $('#to5').show();
          var val = parseInt(to_val) + 1;
          $('#from5').val(val);
          $('#from5').attr('readonly','readonly');
          $('#to5').focus();

        }
      }
      function to_value5()
      {
       var from_val = $('#from5').val();
        var to_val = $('#to5').val();
        if(parseInt(to_val) < parseInt(from_val))
        {
          $('#to5').val(0);
        }
        else
        {

        }
      }
    