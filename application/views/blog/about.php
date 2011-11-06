<?php $this->load->view('blog/header');?>

<body>
    <div id="container">
    	<div id="header">
        
        </div><!-- Close header -->
        
        <div id="content">
        	
            <?php $this->load->view('blog/menu');?>
            
            <div class="post">
                <div class="post meta">
                	<div class="title"><h2>About Me</h2></div>
                </div>
                <br clear="all" />
                <p>This is a sample of static page. Edit this page in views/blog/about.php</p>
                
                <p>You can reach me via:</p>
                
                <p><strong>My website</strong>: <a href="http://www.pisyek.com/">http://www.pisyek.com/</a></p>
                <p><strong>Facebook</strong>: <a href="http://www.facebook.com/pisyek">http://www.facebook.com/pisyek</a></p>
                <p><strong>Twitter</strong>: <a href="http://twitter.com/pisyek">http://twitter.com/pisyek</a> | <a href="http://twitter.com/burungpisyek">http://twitter.com/burungpisyek</a></p>
                <p><strong>LinkedIn</strong>: <a>http://www.facebook.com/pisyek</a></p>
                <p><strong>GitHub</strong>: <a>http://twitter.com/pisyek</a></p>
                
                
                <hr />
            </div><!-- Close post -->
            
            
        </div><!-- Close content -->
    	
        <?php $this->load->view('blog/footer');?>
    
    </div><!-- Close container -->
</body>
</html>