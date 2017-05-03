<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bootstrap Template</title>

        <!-- import Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style type="text/css">
            
        </style>
    </head>
    
    <body>
        <div id="thanks"> </div>
        <p>
            <a data-toggle="modal" data-target="#contact" class="btn btn-primary">Contact us</a>
        </p>
        <!-- model content --> 
        <div class="modal fade in" id="contact" > 
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Plan your Party!</h4>
                    </div>
                    <form class="contact">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Email:</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" name="email" required="required" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-lg-2 control-label">Message:</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="8" style="resize: vertical;" required="required" placeholder="Message" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                    </form> 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                        <button class="btn btn-success" id="submit"><i class="glyphicon glyphicon-inbox"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  

        
        <script language="JavaScript" type="text/javascript">
            


        </script>
    
    
    </body>
</html>