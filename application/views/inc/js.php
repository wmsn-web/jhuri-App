<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //=========Side Menu==================
      $(".nvtoggle").click(function(){
        $(".side_menu").toggle(200);
        $("#bars").toggleClass("fa-bars fa-times");
        $("#pageCont").toggleClass("pageCont1 pageCont2");
      });
      //=========Side Menu==================


      //============Bottom Category============
      $("#btmTgl").click(function(){
        $(".cat_menu").slideToggle(200);
        $("#btmBar").toggleClass("fa-bars fa-times");
        $("#pageCont").toggleClass("pageCont1 pageCont2");
        
      });

      $("#catts").click(function(){
        $(".cat_menu").slideToggle(200);
        $("#btmBar").toggleClass("fa-bars fa-times");
        $(".side_menu").toggle(200);
        $("#bars").toggleClass("fa-bars fa-times");
        
        
      });
       //============Bottom Category============

        //============My Order Section============
      $("#adOrd").click(function(){
      
        $(".addOrder").slideToggle(200);
        $("#btmPls").toggleClass("fa-plus-circle fa-times");
        $("#pageCont").toggleClass("pageCont1 pageCont2");
        
      });
      $("#mOrd").click(function(){
      
        $(".myOrder").slideToggle(200);
        $("#pageCont").toggleClass("pageCont1 pageCont2");
        
      });
      $(".bkbtn").click(function(){
      
        $(".myOrder").slideToggle(260);
        $("#pageCont").toggleClass("pageCont1 pageCont2");
        
      });
      //============My Order Section============
      $("#frmMenu").click(function(){
      
        $(".myOrder").slideToggle(260);
        $("#pageCont").toggleClass("pageCont1 pageCont2");
        
      });
      //============My Order Section============
      
      $(".bckbtn").click(function(){
        $(".myProfile").slideToggle(200);
        location.href='<?= base_url(); ?>';
      });
      
      $(".flash").fadeOut(8000);

//============Login & Registration============
      $("#eye").click(function(){
         $("#pass_log").text(function(){
          if($("#pass_log").attr("type") == "text"){
            $("#pass_log").removeAttr("type","text");
            $("#pass_log").attr("type","password");
            $("#eye").removeClass("fa-eye");
            $("#eye").addClass("fa-eye-slash");
          }
          else
          {
            $("#pass_log").removeAttr("type","password");
            $("#pass_log").attr("type","text");
            $("#eye").removeClass("fa-eye-slash");
            $("#eye").addClass("fa-eye");
          }
        });
      });

      $(".reg").click(function(){
        $(".loginProfile").slideToggle(500);
        location.href="<?= base_url(); ?>SignUp";
      });
      $(".registration").slideToggle(500);
      
       $(".login").click(function(){
        $(".registration").slideToggle(500);
        location.href="<?= base_url(); ?>Login";
      });

       $('#phones').on('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       $(".flashof").show(100);
       return false;
      
    }
});
        $("body").click(function(){
          $(".flashof").fadeOut(500);
        });
    });

    $(".phn").click(function(){
         var phone = $(".phn").val();
         alert(phone);
        });
    $("#moreDes").click(function(){
      $("#moreDescr").slideToggle(200);
      $("textarea#txtare").val("");
    });

    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

 function readURLD(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blahd').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

    $("#uplImg").change(function(){
      $(".uploadSec").show(200);
      $("body").css("position","fixed");
      readURL(this);
    });
    $("#uplImg2").change(function(){
      $(".uploadSec2").show(200);
      $("body").css("position","fixed");
      readURLD(this);
    });

    $("#subuplBtn").click(function(){
      $(".subLoder").show();
    });
    $("#subuplBtn2").click(function(){
      $(".subLoder2").show();
    });
  </script>
  
  