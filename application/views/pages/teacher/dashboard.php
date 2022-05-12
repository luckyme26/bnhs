<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title><?= $title;?></title>

<body onload="LoadAll('<?php echo $id; ?>')">

<!-- | Sidebar/menu | -->
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-animate-left" style="z-index:3;width:13em;font-weight:bold;" id="mySidebar"><br>
    <div class="w3-container w3-margin-bottom">
        <center>
            <?php

                if($photo == ''){
                    $img = '<span class="fa fa-user-circle-o" style="font-size:6em;"></span>';
                }else{
                    $img = '<img src="'.base_url().'ProfilePic/teachers/'.$photo.'" load="lazy" class="w3-circle" style="max-width:6em;width:100%;max-height:6em;">';
                }
                echo $img;
            ?>
            <h5 class="w3-text-white"><?php echo strtoupper($name);?></h5>
        </center>
    </div>

    <!--| LINKS |-->
    <div class="w3-bar-block">
        <a href="<?php echo base_url();?>Teacher/dashboard/<?php echo $link;?>" onclick="w3_close()" class="w3-bar-item w3-button w3-white w3-text-blue w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-dashboard w3-margin-left"></span>&nbsp;&nbsp;Dashboard
        </a>


        <a href="<?php echo base_url();?>Teacher/profile/<?php echo $link;?>" onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-user-circle-o w3-margin-left"></span>&nbsp;&nbsp;Profile
        </a>


        <?php
            $this->Teachers_model->ifadviser($id, $link);
        ?>


        <a href="<?php echo base_url();?>Teacher/subjects/overview/<?php echo $link; ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-graduation-cap w3-margin-left"></span>&nbsp;&nbsp;Subjects
        </a>


        <a href="<?php echo base_url();?>Teacher/grading/<?php echo $link;?>" onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-th-list w3-margin-left"></span>&nbsp;&nbsp;Grades
        </a> 


        <a href="<?php echo base_url();?>Teacher/concerns/<?php echo $link;?>"  onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-bookmark w3-margin-left"></span>&nbsp;&nbsp;Concerns <span class="w3-badge w3-circle w3-white" id="counter"></span>
        </a> 


        <!--<a href="<?php echo base_url();?>Teacher/announcement/<?php echo $link;?>" onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class="fa fa-bullhorn w3-margin-left"></span>&nbsp;&nbsp;Announcement
        </a>-->


        <a href="<?php echo base_url();?>Teacher/logout/<?php echo $id;?>" onclick="w3_close()" class="w3-bar-item w3-button w3-text-white w3-hover-text-blue w3-hover-white w3-padding-16" style="border-radius: 30px 0px 0px 30px;">
            <span class=" fa fa-sign-out w3-margin-left"></span>&nbsp;&nbsp;Log Out
        </a> 
    </div>
    <!--| END OF LINKS |-->
</nav>
<!-- | END of Sidebar/menu | -->

    <!-- | Top menu on small screens | -->
    <header class="w3-container w3-top w3-hide-large w3-blue w3-padding">
        <span>
            <img class="w3-circle w3-right" src="<?php echo base_url()?>resource/img/Logo.png" alt="School Logo" style="max-width:60px; width:100%;">

            <div class="w3-dropdown-click w3-right w3-margin-top">
                <button class="w3-button w3-hover-blue w3-blue fa fa-bell w3-large" onclick="dropdownsmall()"><span class="w3-badge w3-circle w3-red" id="notifsmall"></button>

                <div id="itemssmall" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0; width: 20em; height: 30em; overflow: scroll"></div>
            </div>
            
            <h3>
                <a href="javascript:void(0)" class="fa fa-bars w3-button w3-blue w3-xlarge w3-left w3-hover-light-blue w3-round" onclick="w3_open()"></a>
                DASHBOARD
            </h3>
            
        </span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- END | Top menu on small screens-->

    <br class="w3-hide-large"><br class="w3-hide-large"><br class="w3-hide-large">



<!-- PAGE CONTENT -->
<div class="w3-main" style="margin-left: 14.5em;">
 
    <!-- HEADER -->
    <div class="w3-container w3-white w3-hide-small w3-hide-medium" style="box-shadow: 2px 0px 5px 1px gray;">
        <span>
            <h3 class="w3-left w3-padding"><b>DASHBOARD</b></h3></span>
            <div class="w3-dropdown-click w3-right w3-margin-top">
                <button class="w3-button w3-hover-white w3-white fa fa-bell w3-large w3-padding-large" onclick="dropdownlarge()"><span class="w3-badge w3-circle w3-red" id="notiflarge"></button>

                <div id="items" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0; width: 30em; height:35em; overflow: scroll"></div>
            </div>
        </span>
    </div>
    <!-- END OF HEADER -->



    <!-- MAIN CONTENT -->

    <div class="w3-container">
        <div class="w3-padding-6 w3-hide-large"></div>
        <br/>

        <!-- | FIRST ROW | -->
        <div class="w3-row-padding">
            <div class="w3-col m9 w3-margin-bottom">
                <div class="w3-border">
                    <div class="w3-container">
                        <h4>SUBJECT OVERVIEW</h4>
                        
                        <?php
                            $this->Teachers_model->subj_overview($id, $link);
                        ?>
                    </div>
                </div>
            </div>

            <div class="w3-col m3 w3-margin-bottom">
                <div class="w3-border">
                    <div class="w3-container">
                        <h4>ANNOUNCEMENTS</h4>
                        <div id="announcelist"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- | END OF FIRST ROW | -->


        <!-- | SECOND ROW | -->
        <div class="w3-row-padding">
            <div class="w3-col m9 w3-margin-bottom">
                <div class="w3-border">
                    <div class="w3-container">
                        <div class="w3-row-padding">
                            <h4>CALENDAR OF EVENTS</h4>
                            <div class="w3-col m5">
                                <div class="w3-round w3-padding">
                                  
                                    <?php 
                                        echo '<center>';
                                        echo $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5));
                                        echo '</center>';

                                    ?>

                                </div>
                            </div>
                            <div class="w3-col m7">
                                <div class="w3-round">

                                    <?php
                                        $this->Teachers_model->getEventsWithinMonth();
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-col m3">
                <div class="w3-border w3-margin-bottom">
                    <div class="w3-container">
                        <h4>ONLINE <span id="online" class="w3-badge w3-circle w3-green w3-small"></span></h4>
                        <div id="onlinelist"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- | SECOND ROW | END-->

    </div>

</div>
<!-- End PAGE CONTENT -->


<script type="text/javascript">

    function showDesc(y){
        var link = document.getElementById("subjDesc"+y);
    
        link.className -= " w3-hide";
        link.className += " w3-display-bottomleft w3-padding w3-blue w3-animate-opacity ";

    }

    function hideDesc(y){

        var link = document.getElementById("subjDesc"+y);
    
        link.className += " w3-hide";

    }




    function dropdownsmall() {
        var x = document.getElementById("itemssmall");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }

    function dropdownlarge() {
        var x = document.getElementById("items");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }

    //TEACHER
    function LoadAll(a) {
        //Number.isInteger(x);
        //var str = y;
        //var pad = "0000000";
        //var x = pad.substring(0, pad.length - str.length) + str;
        var x = String(a).padStart(7, '0');
        
        setInterval(function(){
            
            //NOTIFICATION
            var notificationcounter = new XMLHttpRequest();
            notificationcounter.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("notifsmall").innerHTML = this.responseText;
                    document.getElementById("notiflarge").innerHTML = this.responseText;
                }
            };

            notificationcounter.open("GET", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/notifcounter/"+x, true);
            notificationcounter.send();


            var notificationitems = new XMLHttpRequest();
            notificationitems.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("itemssmall").innerHTML = this.responseText;
                    document.getElementById("items").innerHTML = this.responseText;
                }
            };

            notificationitems.open("POST", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/notifitems/"+x, true);
            notificationitems.send();
            //NOTIFICATION | END


            var countcern = new XMLHttpRequest();
            countcern.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("counter").innerHTML = this.responseText;
                }
            };

            countcern.open("GET", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/countconcern/"+x, true);
            countcern.send();


            //ONLINE USERS
            var countonlineusers = new XMLHttpRequest();
            countonlineusers.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("online").innerHTML = this.responseText;
                }
            };

            countonlineusers.open("GET", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/countOnline/"+x, true);
            countonlineusers.send();


            var onlinelist = new XMLHttpRequest();
            onlinelist.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("onlinelist").innerHTML = this.responseText;
                }
            };

            onlinelist.open("POST", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/OnlineList/"+x, true);
            onlinelist.send();
            //ONLINE USERS | END


            var announcements = new XMLHttpRequest();
            announcements.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("announcelist").innerHTML = this.responseText;
                }
            };

            announcements.open("POST", "https://"+window.location.hostname+"/BanquerohanNationalHighSchool/Teacher/announcements/"+x, true);
            announcements.send();

        }, 1000);
    }
    //TEACHER | END
</script>

</body>
<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_interior_design&stacked=h, 2017-07-01 04:11:38 GMT -->