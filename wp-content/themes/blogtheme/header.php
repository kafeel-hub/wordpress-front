
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?php wp_head(); ?>
</head>
<body>

    <section id="navbar">
   
        
        <nav class="navbar navbar-expand-lg  navblock navbar-main">
            <div class="container navbar-container">
                <div class="c-header__logo">
                    <?php if(has_custom_logo()){
                        the_custom_logo();
                    }?>
                    
                
                
                    
                </div>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse right-navbar" id="navbarNavDropdown">

                
                    <ul class="navbar-nav align-nav">
                        

                    <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'bs-example-navbar-collapse-1',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
                            ?>

                    
                        
                           
                        <!-- <li class="nav-item appoint-button">
                            <a class="nav-link" href="#"> Book an Appointment</a>
                        </li> -->

                        <!-- <li class="nav-item auth-button">
                            <a class="nav-link" href="#"> Partner Login</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    





