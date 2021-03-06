<section class="home-section home-full-height bg-dark-30" id="home">
    <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=ouGod3pIDmk', containment:'.home-section', startAt:0, mute:false, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
    <div class="video-controls-box">
        <div class="container">
            <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a><a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
        </div>
    </div>

    <div class="titan-caption">
        <div class="caption-content">
            <div class="shadow font-alt mb-30 titan-title-size-1" style="color:#ef4a42; font-size:30px;">Hello &amp; welcome</div>
            <div class="shadow font-alt mb-30 titan-title-size-4" style="color:#715ba7;">E-Cor</div>
            <div class="shadow font-alt mb-30 titan-title-size-1" style="color:#ef4a42; font-size:30px;">Event Coordinator</div>
            <a class="shadow section-scroll btn btn-border-w btn-round" href="#alt-features">Learn More</a>
        </div>
    </div>
</section>
<div class="main">
    <section class="module" id="alt-features">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Our Services</h2>
                    <div class="module-subtitle font-serif">Below are the listed services of the system, E-Cor.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="fa fa-user-circle-o"></span></div>
                        <h3 class="alt-features-title font-alt">Choose Event Planner</h3>You can choose available event planner that will organize your event.
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
                    <div class="alt-services-image align-center"><img src="<?= base_url() ?>images/logo/E-Cor.png" alt="Feature Image"></div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="fa fa-archive"></span></div>
                        <h3 class="alt-features-title font-alt">Packages</h3>There are available packages that you can choose for your event.
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="module bg-dark-90" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="video-box">
                        <div class="video-box-icon"><a class="video-pop-up" href="https://www.youtube.com/watch?v=Ikz5-A3lfnA"><span class="icon-video"></span></a></div>
                        <div class="video-title font-alt">Presentation</div>
                        <div class="video-subtitle font-alt">Watch the video about our new application</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module pb-0" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Our Gallery</h2>
                    <div class="module-subtitle font-serif"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".birthday" data-wow-delay="0.2s">Birthday</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".wedding" data-wow-delay="0.4s">Wedding</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".anniversary" data-wow-delay="0.6s">Anniversary</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid">
            <li class="work-item birthday webdesign">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/birthday1.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Birthday Party</h3>
                </div>
            </li>
            <li class="work-item wedding photography">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/wedding1.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Wedding Event</h3>
                </div>
            </li>
            <li class="work-item birthday webdesign">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/birthday2.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Birthday Party</h3>
                </div>
            </li>
            <li class="work-item wedding photography">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/wedding2.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Wedding Event</h3>
                </div>
            </li>
            <li class="work-item anniversary photography">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/anniversary.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Anniversary Party</h3>
                </div>
            </li>
            <li class="work-item birthday webdesign">
                <div class="work-image"><img src="<?= base_url() ?>images/gallery/birthday3.jpg" alt="Portfolio Item"/></div>
                <div class="work-caption font-alt">
                    <h3 class="work-title">Birthday Party</h3>
                </div>
            </li>
        </ul>
    </section>
    <br>
    <hr class="divider-w">
    <section class="module" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">About Us</h2>
                </div>
            </div>
            <div class="row multi-columns-row post-columns">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="post mb-20">
                        <div class="post-thumbnail">
                            <img src="<?= base_url() ?>images/logo/MainLogo.png" alt="Blog-post Thumbnail"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="post mb-20">
                        <div class="post-thumbnail">
                            <div class="module-subtitle font-serif">
                                Creative Solutions is an organization of IT students of FEU Institute of Technology that develops Web and Mobile solutions that achieves qualitative, profitable, and economically feasible software. This organization consists of four members: Ralph Adrian Buen, Katrina Ysabel V. Esdicul, Juan Carlo D.R Valencia, and Angelo Markus B. Zaguirre. The organization started out to be a start-up team that targets a system for the partial completion of ITWSPEC7 course which is led by Professor Gene Justine P. Rosales. The first project, and currently in its developing phase, is named Event Coordinator (E-Cor), which focuses on E-Commerce that provides services to consumers. These services include event arrangements that is provided by the event planners and event organizers.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row multi-columns-row post-columns">
                <div class="col-sm-6">
                    <div class="post mb-20">
                        <div class="post-thumbnail">
                            <h2 class="module-title font-alt">Vision</h2>
                            <div class="module-subtitle font-serif">
                                Event Coordinator will provide utmost and reliable service that will satisfy our customers.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="post mb-20">
                        <div class="post-thumbnail">
                            <h2 class="module-title font-alt">Mission</h2>
                            <div class="module-subtitle font-serif">
                                To provide service to the customers by guiding and helping them to be in touch with reliable event organizers.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module" id="team" style="margin-top:-200px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Meet Our Team</h2>
                    <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
                </div>
            </div>
            <div class="row">
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                    <div class="team-item">
                        <div class="team-image"><img src="<?= base_url() ?>images/team/ralph.jpg" alt="Member Photo"/>
                            <div class="team-detail">
                                <h5 class="font-alt">Hi all</h5>
                                <p class="font-serif">I'm Ralph, Project Manager, and Graphic Designer. </p>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-descr font-alt">
                            <div class="team-name">Ralph Adrian Buen</div>
                            <div class="team-role">Project Manager</div>
                        </div>
                    </div>
                </div>
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                    <div class="team-item">
                        <div class="team-image"><img src="<?= base_url() ?>images/team/jc.jpg" alt="Member Photo"/>
                            <div class="team-detail">
                                <h5 class="font-alt">Hi all</h5>
                                <p class="font-serif">I'm JC. I have three ways to live my life: Programming. Sports. Gaming.</p>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-descr font-alt">
                            <div class="team-name">Juan Carlo Valencia</div>
                            <div class="team-role">Programmer</div>
                        </div>
                    </div>
                </div>
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                    <div class="team-item">
                        <div class="team-image"><img src="<?= base_url() ?>images/team/markus.jpg" alt="Member Photo"/>
                            <div class="team-detail">
                                <h5 class="font-alt">Hi all</h5>
                                <p class="font-serif">I'm Markus, the webmaster of the E-Cor from Creative Solutions. </p>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-descr font-alt">
                            <div class="team-name">Angelo Markus Zaguirre</div>
                            <div class="team-role">Webmaster</div>
                        </div>
                    </div>
                </div>
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                    <div class="team-item">
                        <div class="team-image"><img src="<?= base_url() ?>images/team/katrina.jpg" alt="Member Photo"/>
                            <div class="team-detail">
                                <h5 class="font-alt">Hi all</h5>
                                <p class="font-serif">I'm Kat. Graphic Designer, Freelance Artist.</p>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-descr font-alt">
                            <div class="team-name">Katrina Ysabel Esdicul</div>
                            <div class="team-role">Negotiation Manager</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="module-small bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
                    <div class="callout-text font-alt">
                        <h3 class="callout-title">Want to become a freelance Event Planner?</h3>
                        <p>Register to E-Cor to earn more money.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="callout-btn-box"><a class="btn btn-w btn-round" href="<?= base_url() ?>register/registerEventPlanner">Register</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="module" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Get in touch</h2>
                    <div class="module-subtitle font-serif"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <form action="<?= base_url() ?>main/contact" method="post" role="form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control <?= !empty(form_error("name")) ? "is-invalid" : ""; ?>" id="name" placeholder="Your Name" value = "<?= set_value("name") ?>"/>
                            <div class="invalid-feedback"><?= form_error('name') ?></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control <?= !empty(form_error("email")) ? "is-invalid" : ""; ?>" name="email" id="email" placeholder="Your Email" value = "<?= set_value("email") ?>"/>
                            <div class="invalid-feedback"><?= form_error('email') ?></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control <?= !empty(form_error("subject")) ? "is-invalid" : ""; ?>" name="subject" id="subject" placeholder="Subject" value = "<?= set_value("subject") ?>" />
                            <div class="invalid-feedback"><?= form_error('subject') ?></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control <?= !empty(form_error("message")) ? "is-invalid" : ""; ?>" name="message" rows="5" placeholder="Message" value = "<?= set_value("message") ?>"></textarea>
                            <div class="invalid-feedback"><?= form_error('message') ?></div>
                        </div>
                        <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>

                    </form>

                    <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>
