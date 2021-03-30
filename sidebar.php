      <div class="column1 left1">
          <nav class="sidebar">
            <div class="text">Welcome Admin</div>
            <ul>
              <li><a href="panel.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a></li>
              <li>
                <a href="#" class="feat-btn"><i class="fas fa-user-injured"></i>&nbsp;&nbsp;&nbsp;&nbsp;Patients<span class="fas fa-caret-down first"></span> </a>
                <ul class="feat-show">
                  <li><a href="patlis.php">Patient List</li>
                  <li><a href="patadd.php">Add Patient</a></li>
                  <li><a href="patedi1.php">Edit Patient</a></li>
                  <li><a href="patbill.php">Patient Bill</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="serv-btn"><i class="fas fa-user-md"></i>&nbsp;&nbsp;&nbsp;&nbsp;Doctors<span class="fas fa-caret-down second"></span></a>
                <ul class="serv-show">
                  <li><a href="doclis.php">Doctor List</li>
                  <li><a href="docadd.php">Add Doctor</a></li>
                  <li><a href="docedi1.php">Edit Doctors</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="trd-btn"><i class="far fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;Appointment<span class="fas fa-caret-down third"></span></a>
                <ul class="trd-show">
                  <li><a href="appview.php">View Appointment</li>
                  <li><a href="appbook.php">Book Appointment</li>
                  <li><a href="appedit.php">Edit Appointment</a></li>
                  <li><a href="appdel1.php">Cancel Appointment</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="frt-btn"><i class="fas fa-capsules"></i>&nbsp;&nbsp;&nbsp;Medicines<span class="fas fa-caret-down fourth"></span> </a>
                <ul class="frt-show">
                  <li><a href="medlis.php">Medicine List</li>
                  <li><a href="medadd.php">Add Medicines</a></li>
                  <li><a href="mededi1.php">Edit Medicines</a></li>
                  <li><a href="meddel1.php">Delete Medicines</a></li>
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


            $('.frt-btn').click(function(){
              $('nav ul .frt-show').toggleClass("show3");
              $('nav ul .fourth').toggleClass("rotate");
            });


            $('nav ul li').click(function(){
              $(this).addClass("active").siblings().removeClass("active");
            });
          </script>
      </div>
