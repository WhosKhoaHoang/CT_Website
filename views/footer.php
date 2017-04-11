        <footer id="soc_media">
            <ul class="soc">
                <li><a class="soc-facebook" href="#"></a></li>
                <li><a class="soc-instagram" href="#"></a></li>
                <li><a class="soc-tumblr" href="#"></a></li>
                <li><a class="soc-twitter" href="#"></a></li>
                <li><a class="soc-youtube" href="#"></a></li>
                <li><a class="soc-yelp soc-icon-last" href="#"></a></li>
            </ul>
            
            <p style="margin-top: 10px;"><strong>CleverTech © ALL RIGHTS RESERVED.</strong></p>
        </footer>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
        <script language="JavaScript" type="text/javascript">
            
            $("#mac_repr_btn").click(function() {

                //console.log($("#mac_repairs").css("display"));
                
                if ($("#mac_repairs").css("display") === "none") {
                    $("#tab_mob_repairs").css("display", "none");
                    $("#mac_repairs").css("display", "block");
                }
            });
            
            
            $("#tab_mob_repr_btn").click(function() {
                //console.log($("#tab_mob_repairs").css("display"));
                
                if ($("#tab_mob_repairs").css("display") === "none") {
                    
                    $("#mac_repairs").css("display", "none");
                    $("#tab_mob_repairs").css("display", "block");
                }
            })
            
            
            $(document).ready(function(){
                $('.carousel').carousel({
                //interval: 6000
                interval: false  //Just say false for testing!
                })
            });
            
            
            function load_home() {
                $.ajax("views/home.php").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });   
            }
            
            
            function load_services() {                
                
                $.ajax("views/services.html").done(function(data) {
                    
                    $("#content").html(data);
                    //window.history.pushState("Details", "Title", "<?php echo(base_url()); ?>/services");
                    
                }).fail(function() {

                    alert("Could not get data!");

                });      
            }

            
            function load_store() {                
                
                $.ajax("views/store.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
  

            function load_contact() {                
                
                $.ajax("views/contact.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
            
            
            function load_stay_clever() {                
                
                $.ajax("views/stay_clever.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
            
            
            function load_open_ticket() {
                $.ajax("views/open_ticket.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });  
            }
            
            
            $("#mac_repr_btn").click(function() {

                if ($("#mac_repairs").css("display") === "none") {
                    $("#tab_mob_repairs").css("display", "none");
                    $("#mac_repairs").css("display", "block");
                }
            });


            $("#tab_mob_repr_btn").click(function() {
                //console.log("HELLO!");

                if ($("#tab_mob_repairs").css("display") === "none") {

                    $("#mac_repairs").css("display", "none");
                    $("#tab_mob_repairs").css("display", "block");
                }
            })
        </script>
        
    </body>
</html>