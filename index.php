<?php   
require_once 'lib/text_read_function.php';
require_once 'lib/csv_read_function.php';
require_once 'lib/json_read_function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0) {
	$filePath = __DIR__ . '/data/Contact.json'; 
	$JSONFile = 'Contact.json';
	$contacts = readJSONFile($JSONFile);
    
    $newContact = [
        'name' => $_POST['name'], 
        'email' => $_POST['email'],
        'subject' => $_POST['subject'],
        'user_message' => $_POST['comments'], 
    ];
    
    $contacts[] = $newContact;
    
    $jsonContent = json_encode($contacts, JSON_PRETTY_PRINT);
    
    file_put_contents($filePath, $jsonContent);
    
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hiric</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesbrand" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css" />

    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/colors/cyan.css" id="color-opt">
</head>

<body data-bs-theme="light">

    <!-- STRAT NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky sticky-white" role="navigation"
        id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.php">
                <i class="mdi mdi-alien"></i>Hiric
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a data-scroll href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#features" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#services" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#contact" class="nav-link">Contact</a>
                    </li>
					<li class="nav-item">
                        <a data-scroll href="Admin.php" class="nav-link">Admin</a>
                    </li>

                </ul>
                <div class="nav-button ms-auto">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button"
                                class="btn btn-primary navbar-btn btn-rounded waves-effect waves-light">Try it for
                                .17 BTC</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- PUT TITLE OF WEBSITE AND MISSION STATEMNT BELOW --TEXT FILE  -->
	<?php
		$missionStatementFile = 'Mission_Statement.txt';
		$MissionStatementContent = readFileContent($missionStatementFile);
	?>

    <!--START HOME-->
    <section class="section bg-home home-half" id="home" data-image-src="images/bg-home.jpg">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-white text-center">
                    <h1 class="home-title">Our Mission Statement and Promise to You</h1>
                    <p class="pt-3 home-desc mx-auto"> <?php echo ($MissionStatementContent); ?></p>
                    <!-- Modal -->
                    <div class="modal fade" id="watchvideomodal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HOME-->
    
    <!-- PUT TITLE OF WEBSITE AND MISSION STATEMNT ABOVE --TEXT FILE -->
    
    <!-- PUT OVERVIEW BELOW SOMEHOW -- TEXT FILE -->
	
	<?php
	$OverviewFile = 'Overview.txt';
	$OverviewContent = readFileContent($OverviewFile);	
	?>

    <!--START FEATURES-->
    <section class="section" id="features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="features-box mt-5 mt-lg-0">
                        <h3 style="text-align: center;">A Look Into the Future and a Look Into Who we Are</h3>
                        <p class="text-muted web-desc"><?php echo ($OverviewContent); ?></p>
                        <a href="#" class="btn btn-primary mt-4 waves-effect waves-light">Learn More <i
                                class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-2">
                    <div class="features-img mx-auto me-lg-0">
                        <img src="images/growth-analytics.svg" alt="macbook image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END FEATURES-->
    
    <!-- PUT OVERVIEW ABOVE SOMEHOW -- TEXT FILE -->
        
    <!--SERVICES BELOW-- JSON FILE -->
    <?php
		$jsonFile = 'Services.json';
		$services = readJSONFile($jsonFile);
	?>
    <!--START SERVICES-->
    <section class="section bg-light " id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="section-title text-center">Our Products and Services</h1>
                    <div class="section-title-border mt-3"></div>
                    <p class="section-subtitle text-muted text-center pt-4 font-secondary">We offer innovative virtual and 
                    augmented reality solutions, including immersive educational experiences, thrilling adventures, advanced quantum computing 
                    services, and online courses in cutting-edge technology.</p>
                </div>
            </div>
            <div class="row mt-5">
            <?php foreach ($services['keyProductsAndServices'] as $service) { ?>
                <div class="col-lg-4 mt-4">
                    <div class="services-box">
                        <div class="d-flex">
                            <i class="pe-7s-diamond text-primary"></i>
                            <div class="ms-4">
                                <h4><?php echo $service['name']; ?></h4>
                                <p class="pt-2 text-muted"><?php echo $service['description']; ?></p>
                                <h4>Applications:</h4>
                                <ul class="text-muted">
                                    <?php foreach ($service['applications'] as $application) { ?>
                                        <li>
                                            <p><strong><?php echo $application['name']; ?>:</strong>
                                            <?php echo $application['description']; ?></p>
                                        </li>
                                	<?php } ?>
                            	</ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!--END SERVICES-->
    
    <!--SERVICES ABOVE-- JSON FILE -->
    
    <!--TEAM BELOW -- CSV FILE -->

    <!--START ABOUT-US-->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="about-title mx-auto text-center">
                        <h2> Our Team </h2>
                        <p class="text-muted pt-4">Our dynamic team, led by industry pioneers and experts in their respective fields, 
                        combines innovative vision, technological expertise, and design excellence to drive Starluxe's mission of 
                        revolutionizing technology and education globally.</p>
                    </div>
                </div>
            </div>
            <?php
				$CSVFile = 'Team.csv';
				$teamMembers = readCSVFile($CSVFile);
			?>
            <div class="row mt-5">
            <?php foreach ($teamMembers as $index => $member) { ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="team-box text-center">
                        <div class="team-wrapper">
                            <div class="team-member">
                                <img alt="" src="images/team/img-<?= $index + 1 ?>.jpg" class="img-fluid rounded">
                            </div>
                        </div>
                        <h4 class="team-name"><?php echo ($member['Name']); ?></h4> <!-- Name -->
                    	<p class="text-uppercase team-designation"><?php echo ($member['Position']); ?></p> <!-- Position -->
                    	<p class="team-description"><?php echo ($member['Description']); ?></p> <!-- Description -->
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </section>
    <!--END ABOUT-US-->
    
    <!--TEAM ABOVE -- CSV FILE -->
    
    <!--CHANGE REVIEWS TO AWARDS BELOW -- CSV FILE -->

	<?php
		$CSVFile = 'Awards.csv';
		$awards = readCSVFile($CSVFile);
	?>
    <!--START TESTIMONIAL-->
    <section class="section bg-light" id="testi">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="section-title text-center">Awards</h1>
                    <div class="section-title-border mt-3"></div>
                    <p class="section-subtitle text-muted text-center font-secondary pt-4">We take immense pride in our 
                    multiple awards, which reflect our commitment to innovation and excellence in technology.
                    </p>
                </div>
            </div>
            <div class="row mt-4">
            <?php foreach ($awards as $index => $award) { ?>
                <div class="col-lg-4">
                    <div class="testimonial-box mt-4">
                        <div class="testimonial-decs p-4">
                        <img src="images/award.jpg" alt=""
                                class="img-fluid mx-auto d-block img-thumbnail rounded-circle mb-4">
                            <div class="p-1">
                                <h5 class="text-center text-uppercase mb-3"> Received in: <?php echo ($award['Year']); ?></h5>
                                <p class="text-muted text-center mb-0"><?php echo ($award['Award']); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--END TESTIMONIAL-->
    
    <!--CHANGE REVIEWS TO AWARDS ABOVE -- CSV FILE -->

    <!-- CONTACT FORM START-->
    <section class="section " id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="section-title text-center">Get In Touch</h1>
                    <div class="section-title-border mt-3"></div>
                    <p class="section-subtitle text-muted text-center font-secondary pt-4">We thrive when coming up with
                        innovative ideas but also understand that a smart concept should be supported with faucibus
                        sapien odio measurable
                        results.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-4 pt-4">
                        <p class="mt-4"><span class="h5">Office Address 1:</span><br> <span
                                class="text-muted d-block mt-2">4461 Cedar Street Moro, AR 72368</span></p>
                        <p class="mt-4"><span class="h5">Office Address 2:</span><br> <span
                                class="text-muted d-block mt-2">2467 Swick Hill Street <br />New Orleans, LA
                                70171</span></p>
                        <p class="mt-4"><span class="h5">Working Hours:</span><br> <span
                                class="text-muted d-block mt-2">9:00AM To 6:00PM</span></p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="custom-form mt-4 pt-4">
                        <form method="POST" name="myForm" action=index.php>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Your name*" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Your email*" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Your Subject.." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <textarea name="comments" id="comments" rows="4" class="form-control"
                                            placeholder="Your message..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary"
                                        value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM END-->

    <!--START FOOTER-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mt-4">
                    <a class="footer-logo text-uppercase" href="#">
                        <i class="mdi mdi-alien"></i>Hiric
                    </a>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Information</h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Bookmarks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Support</h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Disscusion</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Subscribe</h4>
                    <div class="mt-4">
                        <p>In an ideal world this text wouldn’t exist, a client would acknowledge the importance of
                            having web copy before the design starts.</p>
                    </div>
                    <form class="form subscribe">
                        <input placeholder="Email" class="form-control text-white" required>
                        <a href="#" class="submit"><i class="pe-7s-paper-plane"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!--END FOOTER-->

    <!--START FOOTER ALTER-->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-sm-start pull-none">
                        <p class="copy-rights  mb-3 mb-sm-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hiric - Themesbrand
                        </p>
                    </div>
                    <div class="float-sm-end pull-none copyright">
                        <ul class="list-inline d-flex flex-wrap social m-0">
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-microsoft-xbox"></i></a></li>
                        </ul>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                </div>
            </div>
        </div>
    </div>
    <!--END FOOTER ALTER-->

    <!-- Style switcher -->
    <div id="style-switcher">
        <div>
            <h3 class="">Select your color</h3>
            <ul class="pattern">
                <li>
                    <a class="color1" href="javascript: void(0);" onclick="setColor('cyan')"></a>
                </li>
                <li>
                    <a class="color2" href="javascript: void(0);" onclick="setColor('red')"></a>
                </li>
                <li>
                    <a class="color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                </li>
                <li>
                    <a class="color4" href="javascript: void(0);" onclick="setColor('pink')"></a>
                </li>
                <li>
                    <a class="color5" href="javascript: void(0);" onclick="setColor('blue')"></a>
                </li>
                <li>
                    <a class="color6" href="javascript: void(0);" onclick="setColor('purple')"></a>
                </li>
                <li>
                    <a class="color7" href="javascript: void(0);" onclick="setColor('orange')"></a>
                </li>
                <li>
                    <a class="color8" href="javascript: void(0);" onclick="setColor('yellow')"></a>
                </li>
            </ul>
        </div>
        <div class="bottom">
            <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
                <i class="mdi mdi-weather-sunny bx-spin mode-light"></i>
                <i class="mdi mdi-moon-waning-crescent mode-dark"></i>
            </a>
            <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"><i
                    class="mdi mdi-cog  mdi-spin"></i></a>
        </div>
    </div>
    <!-- end Style switcher -->

    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/gumshoe.polyfills.min.js"></script>
    <!-- Main Js -->
    <script src="js/app.js"></script>
</body>

</html>
