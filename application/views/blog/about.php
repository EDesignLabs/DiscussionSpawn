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
                

                <hr />
            </div><!-- Close post -->
            
            
        </div><!-- Close content -->
    	
        <?php $this->load->view('blog/footer');?>
    
    </div><!-- Close container -->
</body>
</html>