<?php include 'includes/header.php'; ?>


<div class="content">
	<div class="html search">
		<div class="title bounceInDown animated">Search Result</div>
		<p class="flipInX animated">
			Sorry,<br />no matches found for <b class="key"></b>
		</p>
	</div>
	<div class="html welcome visible">
		<div class="datetime">
			<div class="day lightSpeedIn animated">Thursday</div>
			<div class="date lightSpeedIn animated">June 18, 2015</div>
			<div class="time lightSpeedIn animated">08:00 AM</div>
		</div>
	</div>
	<div class="html alarm">
		<div class="forecast clearfix">
			<div class="datetime pull-left bounceInLeft animated">
				<div class="day">Thursday</div>
				<div class="date">June 18, 2015</div>
			</div>
			<div class="temperature pull-right bounceInRight animated">
				<div class="unit">
					<span class="ion-ios-sunny-outline"></span> 34<i>&deg;</i>
				</div>
				<div class="location">Kathmandu, Nepal</div>
			</div>
		</div>
		<div class="alarm-list">
			<div class="note clearfix slideInRight animated">
				<div class="time pull-left">
					<div class="hour">9</div>
					<div class="shift">AM</div>
				</div>
				<div class="to-do pull-left">
					<div class="title">Finish HTML Coding</div>
					<div class="subject">Web UI</div>
				</div>
			</div>
			<div class="note clearfix slideInRight animated">
				<div class="time pull-left">
					<div class="hour">1</div>
					<div class="shift">PM</div>
				</div>
				<div class="to-do pull-left">
					<div class="title">Lunch Break</div>
					<div class="subject"></div>
				</div>
			</div>
			<div class="note clearfix slideInRight animated" data-revert="slideOutRight">
				<div class="time pull-left">
					<div class="hour">3</div>
					<div class="shift">PM</div>
				</div>
				<div class="to-do pull-left">
					<div class="title">Design Stand Up</div>
					<div class="subject">Hangouts</div>
					<div class="user-list clearfix">
						<div class="user pull-left">
							<img
								src="https://raw.githubusercontent.com/khadkamhn/secret-project/master/img/usr-i.png" />
						</div>
						<div class="user pull-left">
							<img
								src="https://raw.githubusercontent.com/khadkamhn/secret-project/master/img/usr-ii.png" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="html compose">
		<div class="forms">
			<div class="group clearfix slideInRight animated">
				<label class="pull-left" for="compose-time"><span class="ion-ios-time-outline"></span> Time</label>
				<input class="pull-right" id="compose-time" type="time" />
			</div>
			<div class="group clearfix slideInLeft animated">
				<label class="pull-left" for="compose-date"><span class="ion-ios-calendar-outline"></span> Date</label>
				<input class="pull-right" id="compose-date" type="date" />
			</div>
			<div class="group clearfix slideInRight animated">
				<label class="pull-left" for="compose-title"><span class="ion-ios-paper-outline"></span> Title</label>
				<input class="pull-right" id="compose-title" type="text" />
			</div>
			<div class="group clearfix slideInLeft animated">
				<label class="visible" for="compose-detail"><span class="ion-ios-list-outline"></span> Task</label>
				<textarea class="visible" id="compose-detail" rows="3"></textarea>
			</div>
			<div class="action flipInY animated">
				<button class="btn">Compose</button>
			</div>
		</div>
	</div>
	<div class="html chats">
		<div class="tabs-list clearfix">
			<a href="#" class="tab active">Users</a>
			<a href="#" class="tab">Messages</a>
			<a href="#" class="tab">Groups</a>
		</div>
		<div class="active-users">
			<div class="user clearfix rotateInDownLeft animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/99.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Connor Hartigan</p>
					<p class="position">Web &amp; UI Designer</p>
				</div>
				<div class="idle pull-right"><span class="away"></span></div>
			</div>
			<div class="user clearfix rotateInDownRight animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/89.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Jacob Lennon</p>
					<p class="position">Front-End Developer</p>
				</div>
				<div class="idle pull-right"><span class="offline"></span></div>
			</div>
			<div class="user clearfix rotateInDownLeft animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/79.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Didier Mailly</p>
					<p class="position">Co-Founder</p>
				</div>
				<div class="idle pull-right"><span class="away"></span></div>
			</div>
			<div class="user clearfix rotateInDownRight animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/69.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Miguel Cunha Ferreira</p>
					<p class="position">Sales Manager</p>
				</div>
				<div class="idle pull-right"><span class="online"></span></div>
			</div>
			<div class="user clearfix rotateInDownLeft animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/59.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Eric Yuriev</p>
					<p class="position">App Developer</p>
				</div>
				<div class="idle pull-right"><span class="online"></span></div>
			</div>
			<div class="user clearfix rotateInDownRight animated">
				<div class="photo pull-left">
					<img src="https://randomuser.me/api/portraits/men/49.jpg" />
				</div>
				<div class="desc pull-left">
					<p class="name">Theodore Clark</p>
					<p class="position">Project Manager</p>
				</div>
				<div class="idle pull-right"><span class="online"></span></div>
			</div>
		</div>
	</div>
	<div class="html settings">
		<div class="setting-list">
			<div class="gear clearfix slideInRight animated">
				<div class="title pull-left">General</div>
				<div class="action pull-right">
					<span class="ion-ios-arrow-right"></span>
				</div>
			</div>
			<div class="gear clearfix slideInLeft animated">
				<div class="title pull-left">
					<label for="gear-notice">Notification</label>
				</div>
				<div class="action pull-right">
					<input id="gear-notice" class="on-off" type="checkbox" /><label for="gear-notice"></label>
				</div>
			</div>
			<div class="gear clearfix slideInRight animated">
				<div class="title pull-left">
					<label for="gear-sound">Sound</label>
				</div>
				<div class="action pull-right">
					<input id="gear-sound" class="on-off" type="checkbox" checked /><label for="gear-sound"></label>
				</div>
			</div>
			<div class="gear clearfix slideInLeft animated">
				<div class="title pull-left">Theme</div>
				<div class="action pull-right">
					Standard <span class="ion-ios-arrow-right"></span>
				</div>
			</div>
			<div class="gear clearfix slideInRight animated">
				<div class="title pull-left">Support</div>
				<div class="action pull-right">
					<span class="ion-ios-arrow-right"></span>
				</div>
			</div>
			<div class="gear clearfix slideInLeft animated">
				<div class="title pull-left">Privacy</div>
				<div class="action pull-right">
					<span class="ion-ios-arrow-right"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="html profile">
		<div class="photo flipInX animated">
			<img src="https://raw.githubusercontent.com/khadkamhn/secret-project/master/img/mohan.png" />
			<div class="social">
				<a href="https://facebook.com/khadkamhn" class="soc-item soc-count-1"><span
						class="ion-social-facebook"></span></a>
				<a href="https://twitter.com/khadkamhn" class="soc-item soc-count-2"><span
						class="ion-social-twitter"></span></a>
				<a href="https://github.com/khadkamhn" class="soc-item soc-count-3"><span
						class="ion-social-github"></span></a>
				<a href="https://pinterest.com/khadkamhn" class="soc-item soc-count-4"><span
						class="ion-social-pinterest"></span></a>
				<a href="https://np.linkedin.com/in/khadkamhn" class="soc-item soc-count-5"><span
						class="ion-social-linkedin"></span></a>
				<a href="https://codepen.io/khadkamhn" class="soc-item soc-count-6"><span
						class="ion-social-codepen"></span></a>
				<a href="skype:khadkamhn?userinfo" class="soc-item soc-count-7"><span
						class="ion-social-skype"></span></a>
				<a href="http://dribbble.com/khadkamhn" class="soc-item soc-count-8"><span
						class="ion-social-dribbble"></span></a>
			</div>
		</div>
		<div class="details">
			<p class="heading flipInY animated">
				<span class="name">Mohan Khadka</span><span class="position">Web/Graphic Desiger</span>
			</p>
			<p class="text fadeInUp animated">
				Hi, It's me Mohan from Nepal. I'm a web and graphics designer.
				Designing is my passion and I am still learning and developing
				my skills on graphics designing and coding. I have been working
				on various designing projects.
			</p>
		</div>
	</div>
	<div class="html credits">
		<div class="title flipInY animated">
			I have been using the following assets to build this design
		</div>
		<div class="credit-ol">
			<div class="credit-li lightSpeedIn animated">
				<a href="https://www.google.com/fonts/specimen/Roboto" target="_blank">roboto</a>
				<span>for typography</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="https://jquery.com" target="_blank">jquery</a>
				<span>for design/ui</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="http://ionicons.com/" target="_blank">ionicons</a>
				<span>for icons</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="http://uifaces.com/authorized" target="_blank">ui faces</a>
				<span>for avatar</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="https://daneden.github.io/animate.css/" target="_blank">animate.css</a>
				<span>for animation</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="https://dribbble.com/shots/1928064-Secret-Project" target="_blank">concept of design</a>
				<span>for layout</span>
			</div>
			<div class="credit-li lightSpeedIn animated">
				<a href="https://unsplash.com/photos/6asyCyR0K1Q/download" target="_blank">unsplash.com</a>
				<span>for background</span>
			</div>
		</div>
		<div class="text zoomInUp animated">
			I'm glad for using these resources and expecting same as time
			ahead
		</div>
	</div>
</div>



<?php include 'includes/footer.php'; ?>