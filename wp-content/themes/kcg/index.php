<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kcg
 */

get_header();

?>
<div class="main-content pages" id="pages">  
	<section>
	<div class="scrolldown s-white">
		<span>SCROLL</span>
	</div>

	<div class="home-bullets">
		<div data-target="slide-1" class="button b-bullet active">
			<div class="wrapper"></div>
		</div>
		<div data-target="slide-2" class="button b-bullet">
			<div class="wrapper"></div>
		</div>
		<div data-target="slide-3" class="button b-bullet">
			<div class="wrapper"> </div>
		</div>
		<div data-target="slide-4" class="button b-bullet">
			<div class="wrapper"></div>
		</div>
		<div data-target="slide-5" class="button b-bullet">
			<div class="wrapper"></div>
		</div>
	</div>
	<div class="home-content hc-slides">
            <div class="home-bckg">
                <div class="shape">
                    <div class="shape-image" style="background-image:url(<?php echo KCG_IMAGES; ?>/home/home-background-1.jpg);"></div>
                    <div class="shape-image" style="background-image:url(<?php echo KCG_IMAGES; ?>/home/home-background-2.jpg);"></div>
                    <div class="shape-image" style="background-image:url(<?php echo KCG_IMAGES; ?>/home/home-background-3.jpg);"></div>
                    <div class="shape-image" style="background-image:url(<?php echo KCG_IMAGES; ?>/home/home-background-4.jpg);"></div>
                </div>
                <div class="images">
                    <div class="img"></div>
                    <div class="img"><img src="<?php echo KCG_IMAGES; ?>/home/home-chess.png" alt=""/></div>
                    <div class="img"><img src="<?php echo KCG_IMAGES; ?>/home/home-astronaut.png" alt=""/></div>
                    <div class="img"><img src="<?php echo KCG_IMAGES; ?>/home/home-phone.png" alt=""/></div>
                </div>
            </div>

            <div class="globe">
                <div class="g-wrapper">
                    <div class="circle"></div>
                    <div id="canvas" class="canvas" data-people='[{"person":"Aline", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-1.png", "place":"south-america"},{"person":"Saul", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-2.png", "place":"europe"},{"person":"Rita", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-3.png", "place":"europe"},{"person":"Fillipa", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-4.png", "place":"north-america"},{"person":"Salman", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-5.png", "place":"asia"},{"person":"Russel", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-6.png", "place":"oceania"},{"person":"Luiz", "thumb":"<?php echo KCG_IMAGES; ?>/photos/person-7.png", "place":"africa"}]'></div>
                </div>
            </div>

            <div class="infos" data-color="#141515" id="slide-1">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                    <div class="col col-5">
                        <h2 class="title t-white">WE ARE AN INTERNATIONAL <strong>COLLABORATIVE <br> OF TALENT</strong></h2>
                    </div>
                    <div class="col col-3 align-self-center">
                        <div class="i-wrapper">
                        <div class="paragraph p-rigth p-white">We transverse global boundaries to help our clients build a better world.</div>
                        <a href="about.html" class="button b-white">
                            <div class="wrapper">
                            <span class="text">READ ABOUT US</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="infos" data-color="#2D3294" id="slide-2">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                    <div class="col col-5">
                        <h2 class="title t-white">WE DELIVER <strong>SPECIALIZED STRATEGIES</strong> TO REACH YOUR GOALS</h2>
                    </div>
                    <div class="col col-3 align-self-center">
                        <div class="i-wrapper">
                        <div class="paragraph p-rigth p-white">Our global team helps you to launch into new areas with expert guidance.</div>
                        <a href="about.html" class="button b-white">
                            <div class="wrapper">
                            <span class="text">Our Solutions</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="infos" data-color="#B27EE4" id="slide-3">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                    <div class="col col-5">
                        <h2 class="title t-white">WE CREATE <strong>INTELLIGENT CONTENT</strong> TO CAPTURE HEARTS</h2>
                    </div>
                    <div class="col col-3 align-self-center">
                        <div class="i-wrapper">
                        <div class="paragraph p-rigth p-white">We generate content that not only gets viewed but shared, time and time again.</div>
                        <a href="about.html" class="button b-white">
                            <div class="wrapper">
                            <span class="text">Our Solutions</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="infos" data-color="#4C9F91" id="slide-4">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                    <div class="col col-5">
                        <h2 class="title t-white">WE DEVELOP PRODUCTS TO HELP YOU <strong>CHANGE THE WORLD</strong></h2>
                    </div>
                    <div class="col col-3 align-self-center">
                        <div class="i-wrapper">
                        <div class="paragraph p-rigth p-white">We work with you to design and create products that grow your business.</div>
                        <a href="about.html" class="button b-white">
                            <div class="wrapper">
                            <span class="text">Our Solutions</span>
                            </div>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="home-content hc-clients">
			<div class="infos" id="slide-5">
				<div class="container-fluid">
					<div class="row justify-content-between">
						<div class="col col-5">
							<h2 class="title">WE WORK WITH THESE <strong>GREAT PEOPLE</strong></h2>
						</div>
						<div class="col col-6">
							<div class="clients c-home">
								<div class="wrapper">
									<div class="line">
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt="" />
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt="" />
										
										</div>
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt=""/>
										
										</div>
									</div>
									<div class="line">
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt=""/>
										
										</div>
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt=""/>
										
										</div>
									</div>
									<div class="line">
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt=""/>
										
										</div>
										<div class="logos">
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt=""/>
										
										<img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt=""/>
										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php

get_footer();
