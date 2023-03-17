@extends('layouts.app')
@section('css')
<style>
    $background: #16a8a3;
$accent: #e45b6c;
$margin: 40px;

html {
  box-sizing: border-box;
}
*, *:before, *:after {
  box-sizing: inherit;
}

html, body {
	height: 100%;
}

body {
	font-family: 'Lato', sans-serif;
	font-weight: 300;
	background: $background;
	display: flex;
	align-items: center;
  	justify-content: center;

}

h1, h2, h3, h4, h5, h6 {
	margin: 0;
	padding: 0;
	font-weight: 300;
}

h1, h2 {
	font-size: 1.5em;
}

h2 {
	&.sub.header {
		font-size: 1em;
	}
}
.row {
	margin-bottom: $margin;
}

.card {
	display: flex;
	background: #fff;
	min-width: 50%;
	border-radius: 5px;
	overflow: hidden;
	box-shadow: 0 2px 4px 0 rgba(34,36,38,.12), 0 2px 10px 0 rgba(34,36,38,.15), 0 55px 50px -20px rgba(34,36,38,.25);

	&-section {
		flex-grow: 1;
		padding: $margin;
	}
	&-info {
		position: relative;
		background: linear-gradient(to bottom, #626d82 0%,#343d4d 100%);
		color: rgba(255, 255, 255, 0.8);
		text-align: center;

		h2 {
			&.sub.header {
				color: rgba(255, 255, 255, 0.3);
			}
		}

		.menu, .search {
			position: absolute;
			font-size: 3em;
			left: $margin;
		}

		.menu {
			top: $margin;
		}

		.search {
			bottom: $margin;
		}
	}

	&-details {
		position: relative;
		color: rgba(0, 0, 0, 0.6);
		width: 50%;
	}
}

.avatar {
	display:inline-block;
	background-image: url('http://radfaces.com/images/avatars/alex-murphy.jpg');
	background-size: cover;
	border-radius: 50%;
	height: 75px;
	width: 75px;
	border: 3px solid $accent;
	box-shadow: 0 2px 4px 0 rgba(0,0,0,.12), 0 2px 10px 0 rgba(0,0,0,.15);
}

.dial {
	color: $accent;
	text-shadow: inset 1px 1px 0 rgba(255, 255, 255, 1);
	background: #fff;
	border-radius: 50%;
	display: inline-block;
	height: 150px;
	margin: 50px 0;
	padding: 40px;
	box-shadow: 0 4px 15px -10px  rgba(0, 0, 0, .1), 0 5px 15px 1px rgba(0, 0, 0, .18), 0 0 0 15px #fff, 0 0 0 22px $accent, 0 55px 50px -20px rgba(34,36,38,.25);

	&-title {
		font-size: 3.8em;
		font-weight: 400;
		line-height: .8;

	}
	&-value {
		font-size: 1.8em;
	}
}

.menu {
	display: flex;
	justify-content: space-between;
	margin-bottom: $margin;
	&-item {
		font-size: 1.6em;
		font-weight: 400;
		padding: 20px 40px;
		color: rgba(0, 0, 0, 0.3);
		min-width: 50%;

		&:not(:last-child) {
			box-shadow: 25px 0px 0 -24px rgba(0, 0, 0, 0.2);
		}

		&:last-child {
			text-align: right;
		}

		&-active {
			color: tint( $accent, 20% );
		}
	}
}

.statistics {
	display: flex;
	justify-content: center;

	.statistic {
		padding: 0px 20px;
		min-width: 120px;
		&:not(:last-child) {
			box-shadow: 20px 0px 0px -19px rgba(255, 255, 255, 0.2)
		}

		&-title {
			font-size: 1.5em;
		}
		&-value {
			color: $accent;
			font-size: 2em;
		}
	}
}


.progress {
  display: flex;
  background: rgba(0, 0, 0, 0.1);
  min-height: 12px;
  overflow: hidden;

  &-bar {
    background: tint( $accent, 20% );
    min-height: 10px;
	}
}

.leaderboard {
	height: 100%;
	counter-reset: leaderboard-counter;

	dt {
		position: relative;
		padding-left: 40px;
		margin-bottom: 10px;

		&:before {
			content: counter(leaderboard-counter);
			counter-increment: leaderboard-counter;
			position: absolute;
			left: 0;
			top: 0;
			font-size: 1.3em;
			line-height: .8;
			font-weight: 400;
			color: rgba(0, 0, 0, 0.8);
		}
	}

	dd {
		display: flex;
		margin-bottom: 40px;
		justify-content: space-between;
	}

	&-value {
		font-weight: 700;
	}
}
</style>

@section('title')
    تاربخ العميل
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                قائمة العملاء</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<div class="section section-md py-5">
   <div class="container">
       <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mb-5">
              <a href="https://themesberg.com">
                <img src="https://themesberg.com/img/brand/themesberg-logo.svg" alt="Logo Themesberg Light" class="mb-4" style="width: 75px;">
              <h1 class="h3 mb-4">Themesberg</h1>
              </a>
               <h6 class="font-weight-bold"><a href="https://themesberg.com/product/ui-kits/pixel-pro-premium-bootstrap-4-ui-kit" target="_blank" class="btn mr-2 mb-2 btn-tertiary animate-up-2">Get timelines</a></h6>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-10 mx-auto">
            <!-- Timeline -->
            <div class="timeline timeline-one">
               <!-- Timeline Item 1 -->
               <div class="timeline-item">
                  <span class="icon icon-info icon-lg"><i class="fab fa-react"></i></span>
                  <h5 class="my-3">React</h5>
                  <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum.</p>
               </div>
               <!-- Timeline Item 2 -->
               <div class="timeline-item">
                  <span class="icon icon-secondary"><i class="fab fa-vuejs"></i></span>
                  <h5 class="my-3">VueJs</h5>
                  <p>Bootstrap. Build responsive, mobile-first projects on the web with the world's most popular front-end component library. Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas.</p>
               </div>
               <!-- Timeline Item 3 -->
               <div class="timeline-item">
                  <span class="icon icon-danger"><i class="fab fa-angular"></i></span>
                  <h5 class="my-3">Angular</h5>
                  <p>AngularJS is a JavaScript-based open-source front-end web application framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications.</p>
               </div>
            </div>
            <!--End of Timeline-->
         </div>
      </div>
      <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mt-6 mb-5">
               <h6 class="font-weight-bold">Timeline Style 2</h6>
            </div>
         </div>
      </div>
      <!-- End of Title -->
      <div class="row mt-4">
         <div class="col-md-10 mx-auto">
            <!-- Timeline -->
            <div class="timeline timeline-two">
               <!-- Timeline Item 1 -->
               <div class="timeline-item shadow-sm border border-light">
                  <div class="post-meta mb-3"><a class="text-secondary mr-2" href="#"><i class="far fa-heart mr-2"></i>2.1k</a> <span class="text-light"><i class="far fa-clock mr-2"></i>Jan 03, 2019</span></div>
                  <h5>We open our first office</h5>
                  <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum.</p>
                  <a href="#" class="btn btn-link text-dark btn-icon"><span class="btn-inner-icon"><i class="fab fa-readme"></i></span> <span class="btn-inner-text font-weight-bold">See story</span></a>
               </div>
               <!-- Timeline Item 2 -->
               <div class="timeline-item shadow-sm border border-light">
                  <div class="post-meta mb-3"><a class="text-secondary mr-2" href="#"><i class="far fa-heart mr-2"></i>10k</a> <span class="text-light"><i class="far fa-clock mr-2"></i>Mar 10, 2017</span></div>
                  <h5>We sold more than 1000 copies</h5>
                  <p>Bootstrap. Build responsive, mobile-first projects on the web with the world's most popular front-end component library. Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas.</p>
                  <a href="#" class="btn btn-link text-dark btn-icon"><span class="btn-inner-icon"><i class="fab fa-readme"></i></span> <span class="btn-inner-text font-weight-bold">See story</span></a>
               </div>
               <!-- Timeline Item 3 -->
               <div class="timeline-item shadow-sm border border-light">
                  <div class="post-meta mb-3"><a class="text-secondary mr-2" href="#"><i class="far fa-heart mr-2"></i>15.2k</a> <span class="text-light"><i class="far fa-clock mr-2"></i>Set 24, 2016</span></div>
                  <h5>The begining</h5>
                  <p>AngularJS is a JavaScript-based open-source front-end web application framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications.</p>
                  <a href="#" class="btn btn-link text-dark btn-icon"><span class="btn-inner-icon"><i class="fab fa-readme"></i></span> <span class="btn-inner-text font-weight-bold">See story</span></a>
               </div>
            </div>
            <!-- End of Timeline -->
         </div>
      </div>
      <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mt-6 mb-5">
               <h6 class="font-weight-bold">Timeline Style 3</h6>
            </div>
         </div>
      </div>
      <!-- End of Title -->
      <div class="row mt-4">
         <!-- Timeline -->
         <div class="vertical-timeline">
            <!-- Timeline Item 1 -->
            <div class="row d-flex align-items-center">
               <div class="col-md-2 text-center bottom">
                  <div class="shape bg-primary d-flex align-items-center justify-content-center organic-radius icon-white"><i class="fab fa-angular"></i></div>
               </div>
               <div class="col-md-6">
                  <h6>Organic shape</h6>
                  <p>Picseel ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>
               </div>
            </div>
            <div class="row timeline-inner">
               <div class="col-md-2">
                  <div class="corner top-right"></div>
               </div>
               <div class="col-md-8">
                  <hr>
               </div>
               <div class="col-md-2">
                  <div class="corner left-bottom"></div>
               </div>
            </div>
            <!-- Timeline Item 2 -->
            <div class="row align-items-center justify-content-end vertical-timeline">
               <div class="col-md-6 text-right">
                  <h6>Circle shape</h6>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>
               </div>
               <div class="col-md-2 text-center full">
                  <div class="shape bg-secondary right d-flex align-items-center justify-content-center icon-white rounded-circle"><i class="fab fa-vuejs"></i></div>
               </div>
            </div>
            <div class="row timeline-inner">
               <div class="col-md-2">
                  <div class="corner right-bottom"></div>
               </div>
               <div class="col-md-8">
                  <hr>
               </div>
               <div class="col-md-2">
                  <div class="corner top-left"></div>
               </div>
            </div>
            <!-- Timeline Item 3 -->
            <div class="row align-items-center vertical-timeline">
               <div class="col-md-2 text-center top">
                  <div class="shape bg-tertiary d-flex align-items-center justify-content-center icon-white"><i class="fab fa-react"></i></div>
               </div>
               <div class="col-md-6">
                  <h6>Square shape</h6>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.</p>
               </div>
            </div>
         </div>
         <!-- End of Timeline -->
      </div>
      <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mt-6 mb-5">
               <h6 class="font-weight-bold">Timeline Style 4</h6>
            </div>
         </div>
      </div>
      <!-- End of Title -->
      <div class="row mt-4">
         <div class="col-md-10 mx-auto">
            <!-- Timeline -->
            <div class="timeline timeline-four">
               <!-- Timeline Item 1 -->
               <div class="timeline-item">
                  <div class="icon"></div>
                  <div class="date-content">
                     <div class="date-outer"><span class="date"><i class="far fa-money-bill-alt"></i> <span class="year mt-1">2018-2019</span></span></div>
                  </div>
                  <div class="timeline-content">
                     <h5 class="title">Business</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.</p>
                  </div>
               </div>
               <!-- Timeline Item 2 -->
               <div class="timeline-item">
                  <div class="icon"></div>
                  <div class="date-content">
                     <div class="date-outer"><span class="date"><i class="far fa-lightbulb"></i> <span class="year mt-1">2017-2018</span></span></div>
                  </div>
                  <div class="timeline-content">
                     <h5 class="title">Development</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.</p>
                  </div>
               </div>
               <!-- Timeline Item 3 -->
               <div class="timeline-item">
                  <div class="icon"></div>
                  <div class="date-content">
                     <div class="date-outer"><span class="date"><i class="far fa-paper-plane"></i> <span class="year mt-1">2015-2016</span></span></div>
                  </div>
                  <div class="timeline-content">
                     <h5 class="title">Marketing</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.</p>
                  </div>
               </div>
            </div>
            <!-- End of Timeline -->
         </div>
      </div>
      <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mt-6 mb-5">
               <h6 class="font-weight-bold">Timeline Style 5</h6>
            </div>
         </div>
      </div>
      <!-- End of Title -->
      <div class="row mt-4">
         <!-- Timeline -->
         <div class="timeline timeline-five px-3 px-sm-0">
            <!-- Item 1 -->
            <div class="row">
               <!-- timeline item 1 center image & middle line -->
               <div class="col-auto text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid rounded-circle" src="https://demo.themesberg.com/pixel-pro/assets/img/team/8.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <!-- Timeline item 1 content-->
               <div class="col-12 col-lg-12 col-xl-11 my-4">
                  <div class="card shadow-sm bw-md border-primary text-primary">
                     <div class="card-body">
                        <div class="post-meta float-right"><a class="text-primary" href="#"><i class="far fa-thumbs-up"></i>345</a></div>
                        <h5 class="card-title text-primary">Time Schedule 1</h5>
                        <p class="card-text">Stay organized, reduce stress, and accomplish personal and business goals with a daily schedule template. It’s a simple yet effective time-management tool for any daily activity, whether you’re managing a busy work schedule, academic assignments or family chores.</p>
                        <button class="btn btn-sm btn-primary" type="button" data-target="#t1_details" data-toggle="collapse">Show Details <i class="fas fa-angle-down toggle-arrow ml-1"></i></button>
                        <div class="collapse" id="t1_details">
                           <div class="p-2 mt-3 text-monospace">
                              <div>08:30 - 09:00 Breakfast in Town</div>
                              <div>09:00 - 10:30 Attend a team meeting</div>
                              <div>10:30 - 10:45 Research on new technologies and tools</div>
                              <div>10:45 - 12:00 It’s a good idea to review the day’s work</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Item 2 -->
            <div class="row">
               <!-- timeline item 2 center image & middle line -->
               <div class="col-auto text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid rounded-circle" src="https://demo.themesberg.com/pixel-pro/assets/img/team/10.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <!-- Timeline item 2 content -->
               <div class="col-12 col-lg-12 col-xl-11 my-4">
                  <div class="card shadow-sm bw-md border-secondary text-success">
                     <div class="card-body">
                        <div class="post-meta float-right"><a class="text-secondary" href="#"><i class="far fa-thumbs-up"></i>515</a></div>
                        <h5 class="card-title text-secondary">Time Schedule 2</h5>
                        <p class="card-text">Stay organized, reduce stress, and accomplish personal and business goals with a daily schedule template. It’s a simple yet effective time-management tool for any daily activity, whether you’re managing a busy work schedule, academic assignments or family chores.</p>
                        <button class="btn btn-sm btn-secondary" type="button" data-target="#t2_details" data-toggle="collapse">Show Details <i class="fas fa-angle-down toggle-arrow ml-1"></i></button>
                        <div class="collapse" id="t2_details">
                           <div class="p-2 mt-3 text-monospace">
                              <div>08:30 - 09:00 Breakfast in Town</div>
                              <div>09:00 - 10:30 Attend a team meeting</div>
                              <div>10:30 - 10:45 Research on new technologies and tools</div>
                              <div>10:45 - 12:00 It’s a good idea to review the day’s work</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Timeline Item 3 -->
            <div class="row">
               <!-- timeline item 3 center image & middle line -->
               <div class="col-auto text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid rounded-circle" src="https://demo.themesberg.com/pixel-pro/assets/img/team/9.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <!-- Timeline item 3 content -->
               <div class="col-12 col-lg-12 col-xl-11 my-4">
                  <div class="card shadow-sm bw-md border-tertiary text-tertiary">
                     <div class="card-body">
                        <div class="post-meta float-right"><a class="text-tertiary" href="#"><i class="far fa-thumbs-up"></i>115</a></div>
                        <h5 class="card-title text-tertiary">Time Schedule 3</h5>
                        <p class="card-text">Stay organized, reduce stress, and accomplish personal and business goals with a daily schedule template. It’s a simple yet effective time-management tool for any daily activity, whether you’re managing a busy work schedule, academic assignments or family chores.</p>
                        <button class="btn btn-sm btn-tertiary" type="button" data-target="#t3_details" data-toggle="collapse">Show Details <i class="fas fa-angle-down toggle-arrow ml-1"></i></button>
                        <div class="collapse" id="t3_details">
                           <div class="p-2 mt-3 text-monospace">
                              <div>08:30 - 09:00 Breakfast in Town</div>
                              <div>09:00 - 10:30 Attend a team meeting</div>
                              <div>10:30 - 10:45 Research on new technologies and tools</div>
                              <div>10:45 - 12:00 It’s a good idea to review the day’s work</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End of Timeline -->
      </div>
      <!-- Title  -->
      <div class="row">
         <div class="col-md-4 text-center mx-auto">
            <div class="mt-6 mb-5">
               <h6 class="font-weight-bold">Timeline Style 6</h6>
            </div>
         </div>
      </div>
      <!-- End of Title -->
      <div class="row mt-4">
         <!-- Timeline -->
         <div class="timeline timeline-six px-3 px-sm-0">
            <!-- Timeline Item 1 -->
            <div class="row no-gutters">
               <div class="col-sm">
                  <!--spacer-->
               </div>
               <!-- timeline item 1 center image & middle line -->
               <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid organic-radius border-tertiary" src="https://demo.themesberg.com/pixel-pro/assets/img/team/9.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <!-- timeline profile card -->
               <div class="col-sm py-2">
                  <div class="profile-card">
                     <div class="card shadow border-light">
                        <div class="card-body">
                           <h5 class="card-title">Tanislav Robert</h5>
                           <h6 class="card-subtitle">Director</h6>
                           <p class="card-text my-2">I spend my days with my hands in many different areas of web development from back end programming to front end engineering, digital accessibility, user experience and visual design.</p>
                           <ul class="social-buttons mt-3">
                              <li><a href="#" target="_blank" class="btn btn-link btn-facebook"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-twitter"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-slack"><i class="fab fa-slack-hash"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dribbble"><i class="fab fa-dribbble"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-google-plus"><i class="fab fa-google-plus"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dropbox"><i class="fab fa-dropbox"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Timeline Item 2 -->
            <div class="row no-gutters">
               <!-- timeline profile card -->
               <div class="col-sm py-2">
                  <div class="profile-card">
                     <div class="card shadow border-light">
                        <div class="card-body">
                           <h5 class="card-title">Zoltan Szőgyényi</h5>
                           <h6 class="card-subtitle">Founder</h6>
                           <p class="card-text my-2">I spend my days with my hands in many different areas of web development from back end programming to front end engineering, digital accessibility, user experience and visual design.</p>
                           <ul class="social-buttons mt-3">
                              <li><a href="#" target="_blank" class="btn btn-link btn-facebook"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-twitter"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-slack"><i class="fab fa-slack-hash"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dribbble"><i class="fab fa-dribbble"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-google-plus"><i class="fab fa-google-plus"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dropbox"><i class="fab fa-dropbox"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- timeline item 2 center image & middle line -->
               <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid organic-radius border-secondary" src="https://demo.themesberg.com/pixel-pro/assets/img/team/8.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <div class="col-sm">
                  <!--spacer-->
               </div>
            </div>
            <!-- Timeline Item 3 -->
            <div class="row no-gutters">
               <div class="col-sm">
                  <!--spacer-->
               </div>
               <!-- timeline item 3 center image & middle line -->
               <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid organic-radius border-warning" src="https://demo.themesberg.com/pixel-pro/assets/img/team/10.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <!-- timeline profile card -->
               <div class="col-sm py-2">
                  <div class="profile-card">
                     <div class="card shadow border-light">
                        <div class="card-body">
                           <h5 class="card-title">Calota Oana</h5>
                           <h6 class="card-subtitle">Marketing</h6>
                           <p class="card-text my-2">I spend my days with my hands in many different areas of web development from back end programming to front end engineering, digital accessibility, user experience and visual design.</p>
                           <ul class="social-buttons mt-3">
                              <li><a href="#" target="_blank" class="btn btn-link btn-facebook"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-twitter"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-slack"><i class="fab fa-slack-hash"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dribbble"><i class="fab fa-dribbble"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-google-plus"><i class="fab fa-google-plus"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dropbox"><i class="fab fa-dropbox"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Timeline Item 4 -->
            <div class="row no-gutters">
               <!-- timeline profile card -->
               <div class="col-sm py-2">
                  <div class="profile-card">
                     <div class="card shadow border-light">
                        <div class="card-body">
                           <h5 class="card-title">Lucian Tanislav</h5>
                           <h6 class="card-subtitle">Sales</h6>
                           <p class="card-text my-2">I spend my days with my hands in many different areas of web development from back end programming to front end engineering, digital accessibility, user experience and visual design.</p>
                           <ul class="social-buttons mt-3">
                              <li><a href="#" target="_blank" class="btn btn-link btn-facebook"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-twitter"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-slack"><i class="fab fa-slack-hash"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dribbble"><i class="fab fa-dribbble"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-google-plus"><i class="fab fa-google-plus"></i></a></li>
                              <li><a href="#" target="_blank" class="btn btn-link btn-dropbox"><i class="fab fa-dropbox"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- timeline item 4 center image & middle line -->
               <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                     <div class="col middle-line"> </div>
                     <div class="col"> </div>
                  </div>
                  <span class="m-3 avatar-separator"><img class="img-fluid organic-radius border-info" src="https://demo.themesberg.com/pixel-pro/assets/img/team/6.jpg" alt="avatar"></span>
                  <div class="row h-50">
                     <div class="col"> </div>
                     <div class="col"> </div>
                  </div>
               </div>
               <div class="col-sm">
                  <!--spacer-->
               </div>
            </div>
         </div>
         <!-- End of Timeline -->
      </div>
   </div>
</div>
<div class="card">
	<section class="card-info card-section">
		<i class="ion-navicon menu"></i>
		<i class="ion-ios-search search"></i>

		<div class="avatar row">
		</div>

		<section class="user row">
			<h1 class="user-header">
				Bryan Smith
				<h2 class="sub header">
					400 hours
				</h2>
			</h1>
		</section>

		<section class="statistics">
			<article class="statistic">
				<h4 class="statistic-title">
					Rank
				</h4>
				<h3 class="statistic-value">
					360
				</h3>
			</article>

			<article class="statistic">
				<h4 class="statistic-title">
					Score
				</h4>
				<h3 class="statistic-value">
					1,034
				</h3>
			</article>
		</section>

		<div class="dial">
			<h2 class="dial-title">
				35
			</h2>
			<h3 class="dial-value">
				Level
			</h3>
		</div>
	</section>
	<section class="card-details card-section">

		<nav class="menu">
			<article class="menu-item menu-item-active">
				Global
			</article>
			<article class="menu-item">
				Friends
			</article>
		</nav>

		<dl class="leaderboard">
			<dt>
				<article class="progress">
				  <section class="progress-bar" style="width: 85%;"></section>
				</article>
			</dt>
			<dd>
				<div class="leaderboard-name">Bryan Smith</div>
				<div class="leaderboard-value">20.123</div>
			</dd>
			<dt>
				<article class="progress">
				  <section class="progress-bar" style="width: 65%;"></section>
				</article>
			</dt>
			<dd>
				<div class="leaderboard-name">Kevin Johnson</div>
				<div class="leaderboard-value">16.354</div>
			</dd>
			<dt>
				<article class="progress">
				  <section class="progress-bar" style="width: 60%;"></section>
				</article>
			</dt>
			<dd>
				<div class="leaderboard-name">Glen Howie</div>
				<div class="leaderboard-value">15.873</div>
			</dd>
			<dt>
				<article class="progress">
				  <section class="progress-bar" style="width: 55%;"></section>
				</article>
			</dt>
			<dd>
				<div class="leaderboard-name">Mark Desa</div>
				<div class="leaderboard-value">12.230</div>
			</dd>
			<dt>
				<article class="progress">
				  <section class="progress-bar" style="width: 35%;"></section>
				</article>
			</dt>
			<dd>
				<div class="leaderboard-name">Martin Geiger</div>
				<div class="leaderboard-value">10.235</div>
			</dd>
		</dl>
	</section>
</div>

@endsection
@section('js')






@endsection
