<div class="column1 left1">
    <nav class="sidebar">
      <div class="text">Welcome Doctor</div>
      <ul>
        <li><a href="panel.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a></li>
        <li>
          <a href="#" class="trd-btn"><i class="fas fa-user-md"></i>&nbsp;&nbsp;&nbsp;&nbsp;Profile<span class="fas fa-caret-down third"></span> </a>
          <ul class="trd-show">
            <li><a href="docedi.php">Edit Profile</li>
            <li><a href="changepass.php">Change Password</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="feat-btn"><i class="far fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;Appointments<span class="fas fa-caret-down first"></span> </a>
          <ul class="feat-show">
            <li><a href="apptod.php">Today</li>
            <li><a href="appup.php">Upcoming</a></li>
            <li><a href="appcom.php">Completed</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="serv-btn"><i class="fas fa-file-medical"></i>&nbsp;&nbsp;&nbsp;&nbsp;Patient<span class="fas fa-caret-down second"></span></a>
          <ul class="serv-show">
            <li><a href="pres.php?id=">Prescribe Medicine</li>
            <li><a href="medhis.php">Medical History</a></li>
          </ul>
        </li>

      </ul>
    </nav>
    <script>
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });


      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });


      $('.trd-btn').click(function(){
        $('nav ul .trd-show').toggleClass("show2");
        $('nav ul .third').toggleClass("rotate");
      });


      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
</div>
