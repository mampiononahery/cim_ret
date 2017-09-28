<body>
    <input type="hidden" value="1" name="pardef" id="pardef" />
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1" id="banniere"> <img src="<?php echo base_url(); ?>images/banniere_new.jpg" style="padding-right:0px; width:100%;" height="150" /> </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1" id="connexion"> </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1" id="barre_menu">
                <nav role="navigation" class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" data-target="#menu" data-toggle="collapse" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <!-- Collection of nav links and other content for toggling -->
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav" id="elements">
                            <li><a href="<?php echo site_url('home'); ?>" id="home"><span class="glyphicon glyphicon-home" ></span></a></li>
                            <li><a href="<?php echo site_url('home/exemplesretouches'); ?>">NOS RETOUCHES</a></li>
                            <?php if ($this->session->userdata('abonnement')) { ?>
                                <li><a href="<?php echo site_url('home/formules'); ?>">MES ABONNEMENTS</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo site_url('home/formules'); ?>">NOS FORMULES</a></li>
                                    <?php } ?>
                                        <li><a href="<?php echo site_url('home/contact'); ?>"> CONTACT</a></li>
                        </ul>
                        <div style="margin-right:0px;margin-top: 8px;">
                            <?php if (!$this->session->userdata('email')) { ?>
                                <form class="form-inline" action="<?php echo base_url('home/login'); ?>" method="post">
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;&nbsp;</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Login"> </div>
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;&nbsp;</label>
                                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mot de passe"> </div> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-warning" style="height:30px;">Valider</button>
                                </form>
                                <?php } else { ?> Bonjour
                                    <?php echo $this->session->userdata('nom'); ?>, <a href="<?php echo base_url('home/logout'); ?>">Deconnexion</a>
                                        <?php } ?>
                        </div>
                        <!--span class="pull-right" id="drapeaux" style="width: 180px;height: 41px;background-color: #fbd3f9;opacity: 0.9;text-align: center;margin-top: -35px;margin-bottom: 6px;padding-top: 10px;color: black;border-radius: 8px;">				                            <a href="#"><img src="<?php echo base_url(); ?>images/FR.gif"/></a>				                            <a href="#"><img src="<?php echo base_url(); ?>images/GB.gif"/></a>				                            <a href="#"><img src="<?php echo base_url(); ?>images/ES.gif"/></a>				                        </span--></div>
                </nav>
            </div>
        </div>