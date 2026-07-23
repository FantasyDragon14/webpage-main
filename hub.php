<!doctype html>

<html>
	<head>
		<meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title>Main hub FantasyDragons website</title>
		<meta name="title" content="FantasyDragon main Hub" />
		<meta name="description" content="Personal website of FantasyDragon14 / Ayla" />

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://fantasydragon.xyz/hub" />
		<meta property="og:title" content="FantasyDragon main Hub" />
		<meta property="og:description" content="Personal website of FantasyDragon14 / Ayla" />
		<!-- <meta property="og:image" content="http://fantasydragon.xyz/assets/embeds/site-embed-vaporwave.gif" />
		TODO make embed art for hub
		-->

		<meta content="#00ffff" data-react-helmet="true" name="theme-color" />

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:url" content="https://fantasydragon.xyz/hub" />
		<meta property="twitter:title" content="FantasyDragon main Hub" />
		<meta property="twitter:description" content="Personal website of FantasyDragon14 / Ayla" />
		<!-- <meta property="twitter:image" content="http://fantasydragon.xyz/assets/embeds/site-embed-vaporwave.gif" /> -->

		<link href="hub.css" rel="stylesheet" type="text/css" media="all" />

		<!-- <link rel="stylesheet" href="https://nexus.fantasydragon.xyz/nexusring.css" /> -->
		<link rel="stylesheet" href="https://test.fantasydragon.xyz/webring/nexusring.css" />

		<link href="/assets/favicons/favicon-den.png" rel="icon" type="image/png" />

		<!-- Preload some Images that are used -->
		<link rel="preload" href="/assets/backgrounds/clouds/1.png" as="image" />
		<link rel="preload" href="/assets/backgrounds/clouds/2.png" as="image" />
		<link rel="preload" href="/assets/backgrounds/clouds/3.png" as="image" />
		<link rel="preload" href="/assets/backgrounds/clouds/4.png" as="image" />

		<link rel="preload" href="/assets/dragonpet/fantasydragon-sleeping.gif" as="image" />
		<link rel="preload" href="/assets/dragonpet/fantasydragon-attention.gif" as="image" />
		<link rel="preload" href="/assets/dragonpet/fantasydragon-petted.gif" as="image" />

		<link rel="prefetch" href="/assets/dragonpet/fantasydragon-sleeping.gif" as="image" />
	</head>

	<body>
		<!-- background -->
		<div id="bg-container">
			<ul>
				<li style="height: 100%; margin-top: 300px"></li>
				<!-- removes the damn gap/repeat at the bottom of the page by filling it with white -->
				<li style="background: url(/assets/backgrounds/clouds/1.png); animation-duration: 60s"></li>
				<li style="background: url(/assets/backgrounds/clouds/2.png); animation-duration: 40s"></li>
				<li style="background: url(/assets/backgrounds/clouds/3.png); animation-duration: 20s"></li>
				<li style="background: url(/assets/backgrounds/clouds/4.png); animation-duration: 10s"></li>
			</ul>
			<!-- because for some reason the preload doesn't work... -->
			<!-- <img src="/assets/dragonpet/fantasydragon-sleeping.gif" alt="" style="width: 0px; height: 0px" />
			<img src="/assets/dragonpet/fantasydragon-attention.gif" alt="" style="width: 0px; height: 0px" />
			<img src="/assets/dragonpet/fantasydragon-petted.gif" alt="" style="width: 0px; height: 0px" /> -->
		</div>
		<!-- <header></header> -->
		<!-- button carousel -->
		<div class="top">
			<h2><a href="about/neighbors">check out my awesome site neighbors:</a></h2>
			<div class="web_buttons" role="region" aria-label="other Sites Button-Carousel">
				<?php include_once 'hubButtons.php' ?>
				<ul>
					<?php printHubButtons() ?>
				</ul>
				<ul aria-hidden>
					<?php printHubButtons() ?>
				</ul>
			</div>
		</div>
		<!-- middle menu and [tbd] -->
		<div class="middle">
			<div class="left">.</div>
			<div class="menu_container">
				<div class="pillar">
					<img src="/assets/backgrounds/pillar-stone.png" alt="a stone pillar" />
				</div>
				<nav class="menu">
					<div class="double">
						<a href="about/me.html">About<br />me</a>
						<a href="about/this-site.html">About<br />this site</a>
					</div>
					<a href="links.html">My linktree</a>
					<a href="library/">The Library</a>
					<a href="https://test.fantasydragon.xyz">My <s>playground</s><br />Testing site</a>
					<!-- <div class="double">
						<a href="gallery/">Gallery</a>
						<a href="https://art.fantasydragon.xyz">My Art</a>
					</div> -->
					<!-- <a href="projects">Projects</a> -->
					<div class="double">
						<a href="question.html">visitor<br />questions</a>
						<a href="the Void">the Void</a>
					</div>
				</nav>
				<div class="pillar">
					<img src="/assets/backgrounds/pillar-stone.png" alt="a stone pillar" />
				</div>
			</div>
			<div class="right"></div>
		</div>
		<!-- pettable dragon and (probably some follow mouse character thingy?) -->
		<div class="island">
			<div class="bottom">
				<div class="left"></div>
				<div class="middle"></div>
				<div class="middle"></div>
				<div class="right"></div>
			</div>
			<div class="ground">
				<div class="left"></div>
				<div class="middle"></div>
				<div class="middle"></div>
				<div class="right"></div>
			</div>
			<div class="dragonsden">
				<img id="dragon_sleep" src="/assets/dragonpet/fantasydragon-sleeping.gif" alt="Sleeping Dragon" title="click to pet :3" />
				<!-- <div id="dragon_sleep" title="click to pet :3"></div> -->
			</div>
			<div id="follow_mouse" class="wip"></div>
		</div>
		<!-- Dock where the webrings can bring you somewhere else -->
		<div class="docks">
			<ul class="webrings">
				<li class="ship" title="webdragons">
					<img src="/assets/webrings/Webringship-Webdragons.png" />
					<div class="webring">
						<div class="webdragons-wrapper" webdragonid="2" url="https://ytd-online-status-checker.onrender.com/webdragons">
							<script src="/assets/webrings/webdragons.js"></script>
							<style></style>
							<p style="width: 460px">Here should be the <a href="https://ytd.wtf/webdragons">webdragons webring</a> widget, but it can't load for some reason.</p>
						</div>
					</div>
				</li>
				<!--
				<li class="ship" title="nexusring">
					<img src="/assets/webrings/2026-01-19 Webringship-wip 2.png" />
					<div class="webring">
						<div id="nexusring">
							<script type="text/javascript" src="https://test.fantasydragon.xyz/webring/nexusring.js"></script>
						</div>
					</div>
				</li> -->
				<!--
				<li class="ship" title="transing the internet">
					<img src="/assets/webrings/2026-01-19 Webringship-wip 2.png" />
					<div class="webring">
						<script src="https://transring.neocities.org/ring.js" data-widget="nb"></script>
					</div>
				</li> -->
			</ul>
			<div class="cargoarea">
				<div class="pier">
					<div class="box"></div>
					<div class="box"></div>
					<div class="box"></div>
				</div>
			</div>
		</div>

		<footer>
			<p class="copyright" id="copyright">©2020 - 2026 FantasyDragon14</p>
			<a class="construction" style="margin-top: 20px" href="https://github.com/users/FantasyDragon14/projects/2">
				<img src="/assets/under_construction.gif" alt="an under construction banner" />
			</a>
			<div class="source">
				<p>Source to this page on Codeberg:</p>
				<a href="https://codeberg.org/Fantasydragon14/webpage-main">
					<img alt="Codeberg Last Commit" src="https://img.shields.io/gitea/last-commit/FantasyDragon14/webpage-main?gitea_url=https%3A%2F%2Fcodeberg.org&style=for-the-badge&labelColor=%23aa00ff" />
				</a>
			</div>
			<div class="visitor_counter">
				visitor count <sup>(allegedly)</sup>
				<img src="guestbook/visitorcounter.php" alt="Visitor Counter" title="We use a Cookie for this, hope that's okay" />
			</div>
		</footer>

	</body>
</html>
