<header class="header header-nav-menu header-nav-links">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="{{asset('ThemeData/img/logo-modern.png')}}" class="logo-image" width="90" height="24" alt="Porto Admin" /><img src="{{asset('ThemeData/img/logo-default.png')}}" class="logo-image-mobile" width="90" height="41" alt="Porto Admin" />
					</a>
					<button class="btn header-btn-collapse-nav d-lg-none" data-bs-toggle="collapse" data-bs-target=".header-nav">
						<i class="fas fa-bars"></i>
					</button>

					<!-- start: header nav menu -->
					<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 header-nav-main-square">

						</div>
					</div>
					<!-- end: header nav menu -->
				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<ul class="notifications">

						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
								<i class="bx bx-bell"></i>
								<span class="badge">3</span>
							</a>

							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-end badge badge-default">3</span>
									Alerts
								</div>

								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="bx bx-dislike bg-danger"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="bx bx-lock-alt bg-warning"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">15 minutes ago</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="bx bx-wifi bg-success"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">10/10/2021</span>
											</a>
										</li>
									</ul>

									<hr />

									<div class="text-end">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-bs-toggle="dropdown">

							<span class="profile-picture profile-picture-as-text">JD</span>
							<div class="profile-info profile-info-no-role" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Hi, <strong class="font-weight-semibold">John Doe</strong></span>
							</div>

							<i class="fas fa-chevron-down text-color-dark"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="bx bx-lock-open-alt"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="bx bx-log-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
</header>