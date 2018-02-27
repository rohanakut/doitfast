<form name="myform">
     <input type="text" />
     <button class="buttonFinish"></button>
 </form>

 <script type="javascipt">
    $(document).ready(function() {
        $('.buttonFinish').click(function(){
            $('.myform').submit();
            //console.log("hello");
        });
    }
  </script>