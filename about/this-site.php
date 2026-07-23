<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Primary Meta Tags -->
		<title>About this site</title>
		<meta name="title" content="About fantasydrgon.xyz" />
		<meta name="description" content="Information about this website" />

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website" />
		<!-- <meta property="og:url" content="https://fantasydragon.xyz/test-template.html" /> -->
		<meta property="og:title" content="About fantasydrgon.xyz" />
		<meta property="og:description" content="Information about this website" />
		<!-- <meta property="og:image" content="https://fantasydragon.xyz/assets/embeds/template-embed.gif" /> -->

		<meta content="#00ffff" data-react-helmet="true" name="theme-color" />

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image" />
		<!-- <meta property="twitter:url" content="https://fantasydragon.xyz/test-template.html" /> -->
		<meta property="twitter:title" content="About fantasydrgon.xyz" />
		<meta property="twitter:description" content="Information about this website" />
		<!-- <meta property="twitter:image" content="https://fantasydragon.xyz/assets/embeds/template-embed.gif" /> -->

		<link href="this-site.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/assets/favicons/favicon-stars.png" rel="icon" type="image/png" />
	</head>
	<body>
		<header>
			<nav><a href="/">/</a> | <a href="/hub">/hub</a> | <a href="me">/about/me</a> | <a href="neighbors">/about/Site-Neighbors</a></nav>
			<h1>About fantasydragon.xyz</h1>
		</header>
		<div>
			<main>
				<p>// I'm gonna put some info of the site here. Maybe updates.</p>
				<p><span class="cmd">./timeline.sh</span></p>

				<div class="Timeline">
					<section>
						<date>2024-02-29</date>
						<p>I create an account on <a href="https://neocities.org">Neocities</a></p>
					</section>
					<section>
						<date>2024-03</date>
						<p>The Initial Idea is slowly implementet, limited a lot by missing assets/artwork and technical skills/experience</p>
					</section>
					<section>
						<date>2024-11-29</date>
						<p>
							After aquiring the <a href="https://fantasydragon.xyz">fantasydragon.xyz</a> domain we decide to self-host the website on a friends raspberry pi<br />
							The <a href="https://neocities.org/site/fantasydragon14">neocities site</a> is still up and brought up to parity (if possible) (60$/month neocities supporter is just too much when i can host my website essentially free with more control)
						</p>
					</section>
					<section>
						<date>2025-02</date>
						<p>subdomains enable more separate sites, helping to host downloads for our minecraft projects on <a href="https://minecraft.fantasydragon.xyz">minecraft.fantasydragon.xyz</a> or separate the playground to <a href="https://test.fantasydragon.xyz">test.fantasydragon.xyz</a>. The main content remains very barebones design-wise though :/</p>
					</section>
					<section>
						<date>2025-12</date>
						<p>Newly aquired skills start the overhaul of the initial hub-page</p>
					</section>
					<section>
						<date>2026-01</date>
						<p>the sitemap grows, slowly, and the hub site is coming together</p>
					</section>
					<section>
						<date>2026-06</date>
						<p>very slowly...</p>
					</section>
				</div>
				<p><span class="cmd">ls buttons</span></p>
				<div class="web-buttons">
					<?php
					include $_SERVER['DOCUMENT_ROOT'] . '/scripts/read_button_csv.php';
					$buttonlist = getButtonsForLocation('site', ['other_buttons.csv']);
					shuffle($buttonlist);
					foreach ($buttonlist as $buttondata) {
						echo $buttondata[0] . "\r\n";
					}
					?>
				</div>
				<p>// the site is hosted on my friends raspberry pi 5 (4GB) with an 128Gb SD</p>
				<p>// We learn a lot while making this site, and take inspiration from or even had/have direct help from many of these people and sites:</p>
				<p><span class="cmd">ls neighbors</span></p>
				<div class="neighbors">
					<a href="neighbors.html#Neighbors">Site Neighbors: listed over here!</a>
				</div>
				<p><span class="cmd">cat neighbors/README.md</span></p>
				<div class="README">
					<p><a href="neighbors.html#BeingANeighbor">How to be my site neighbor</a></p>
				</div>

				<p></p>

				<p>// other stuff will follow...</p>
				<p><span class="cmd">cat under_construction.gif</span></p>
				<div class="constr">
					<a class="construction" style="margin-top: 20px" href="https://github.com/users/FantasyDragon14/projects/2">
						<img src="/assets/under_construction.gif" alt="an under construction banner" />
					</a>
				</div>
			</main>
			<aside class="patchnotes">
				patchnotes:
				<ul>
					<?php echo file_get_contents('site-updates.txt'); ?>
				</ul>
			</aside>
		</div>
	</body>
</html>
