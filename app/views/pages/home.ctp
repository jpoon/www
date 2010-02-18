<script type="text/javascript">
    $(document).ready(function(){
        $("#open_location").click(function() { 
            $("#location").dialog({ 
                bgiframe: true,
                modal: true,
                height: 500,
                width: 500,
                resizeable: false,
                buttons: {
                    Close: function() {
                        $(this).dialog("close");
                    }
                }
            });
            $("#location").dialog("open"); 
        });
    });
</script>

<div id="location" style="display:none;" title="Vancouver, British Columbia, Canada">
    <center>
        <br \>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=University+of+British+Columbia&amp;hl=en&amp;ei=svk-S9e3JJPUoASuvKT0CA&amp;sll=51.163535,-122.719704&amp;sspn=6.537142,1.819655&amp;ie=UTF8&amp;view=map&amp;geocode=FevA7wIdlGSn-A&amp;split=0&amp;ved=0CBkQpQY&amp;hq=&amp;hnear=University+of+British+Columbia+at+Vancouver,+Greater+Vancouver+A,+Greater+Vancouver+Regional+District,+British+Columbia,+Canada&amp;ll=49.237776,-123.156738&amp;spn=0.156914,0.291824&amp;z=11&amp;output=embed"></iframe>
    </center>
</div>

<p>i am <?php echo $html->link(__('Jason Poon', true), 'http://jasonpoon.ca'); ?>.</p>
<p>i am in my final year of studying computer engineering at the <?php echo $html->link('University of British Columbia', "#", array('id' => 'open_location', 'title' => 'Where on earth is this?!')) ?>.</p>
<p>i am usually a quiet type of person, quarrying away at my school work, or striving for success in life.</p>
<p>i am a computer geek, spending the majority of my waking life staring at a computer screen.</p>
<p>i am a code monkey.</p> 
