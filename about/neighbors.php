<!doctype html>
<?php
$_SERVER['DOCUMENT_ROOT'] = '/home/fantasydragon/webpages/test';

include $_SERVER['DOCUMENT_ROOT'] . '/scripts/read_button_csv.php';
$buttonlist = getButtonsForLocation('neighbors', ['neighbors.csv']);
shuffle($buttonlist);
$fields = getfields('neighbors.csv');
$fields_html = array_search('button html', $fields);
$fields_name = array_search('name', $fields);
$fields_desc = array_search('desc', $fields);
$fields_category = array_search('category', $fields);

function getCategory($buttonlist, $category, $categoryfield)
{
	$array = [];
	foreach ($buttonlist as $buttondata) {
		if (str_contains($buttondata[$categoryfield], $category)) {
			$array[] = $buttondata;
		}
	}
	return $array;
}

function printButtons($buttonlist)
{
	global $fields_html;
	global $fields_name;
	global $fields_desc;
	global $fields_category;
	foreach ($buttonlist as $buttondata) {
		echo '<li class="web_button">' . "\r\n";
		echo $buttondata[$fields_html] . "\r\n";
		echo '<h3>' . $buttondata[$fields_name] . '</h3>';
		echo '<p>';
		echo $buttondata[$fields_desc];
		echo '</p>' . "\r\n";
		echo '</li>' . "\r\n";
	}
}

function udiffCompare($a, $b)
{
	return $a <=> $b;
}

?>

<html>
	<head>
		<meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Primary Meta Tags -->
		<title>Site-Neighbors</title>
		<meta name="title" content="Site-Neighbors" />
		<meta name="description" content="List of friend's sites, sites that inspired me or just some we find Cool" />

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website" />
		<!-- <meta property="og:url" content="https://fantasydragon.xyz/test-template.html" /> -->
		<meta property="og:title" content="Site-Neighbors" />
		<meta property="og:description" content="List of friend's sites, sites that inspired me or just some we find Cool" />
		<!-- <meta property="og:image" content="https://fantasydragon.xyz/assets/embeds/template-embed.gif" /> -->

		<meta content="#00ffff" data-react-helmet="true" name="theme-color" />

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image" />
		<!-- <meta property="twitter:url" content="https://fantasydragon.xyz/test-template.html" /> -->
		<meta property="twitter:title" content="Site-Neighbors" />
		<meta property="twitter:description" content="List of friend's sites, sites that inspired me or just some we find Cool" />
		<!-- <meta property="twitter:image" content="https://fantasydragon.xyz/assets/embeds/template-embed.gif" /> -->

		<link href="neighbors.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/assets/favicons/favicon-stars.png" rel="icon" type="image/png" />
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
		<header>
			<nav>| <a href="/hub">back to the hub</a> | <a href="me">about me</a> | <a href="this-site">about this site</a></nav>
		</header>
		<main>
			<h1>Welcome to the neighborhood!</h1>
			<p></p>
			<section class="neighbors" id="CloseNeighbors">
				<h2>Friends:</h2>
				<ul class="web_buttons">
					<?php
					$buttons_friend = getCategory($buttonlist, 'friend', $fields_category);
					printButtons($buttons_friend);
					?>
				</ul>
			</section>
			<section class="neighbors" id="OtherNeighbors">
				<h2>inspiring sites</h2>
				<ul class="web_buttons">
					<?php
					$buttons_insp = getCategory($buttonlist, 'inspiration', $fields_category);
					$buttons_insp = array_udiff($buttons_insp, $buttons_friend, 'udiffCompare');
					printButtons($buttons_insp);
					?>
				</ul>
				<h2>other cool people</h2>
				<ul class="web_buttons">
					<?php
					$buttons_rest = getCategory($buttonlist, '', $fields_category);
					$buttons_rest = array_udiff($buttons_rest, $buttons_friend, 'udiffCompare');
					$buttons_rest = array_udiff($buttons_rest, $buttons_insp, 'udiffCompare');
					printButtons($buttons_rest);
					?>
				</ul>
			</section>
			<section id="BeingANeighbor">
				<h2>Be a Neigbor</h2>
				<p>You want to be our web-neighbor and link to my site? just choose which button you want to display and copy the code</p>
				<div class="buttonselect">
					<img id="ownbtn" src="../buttons" alt="FantasyDragon Button">
					<select name="buttonselector" id="buttonselector" onchange='changeCode()'>
						<option id="button_" value="">random</option><?php
include '../buttons/button_map.php';
foreach ($buttons_available as $option => $val) {
	echo "<option id='button_$option' value='$option'>$option</option>";
}
?>
					</select>
					<style>
<?php
foreach ($buttons_available as $option => $val) {
	echo ":root:has(#button_$option:checked){.buttonselect>img{content:url(../buttons/$option);}}";
}
?>
					</style>
					<script>
image=document.getElementById('ownbtn');
isrand=document.getElementById('button_');
buttonvalues=[...document.getElementById('buttonselector').options].map(o => o.value)
console.log({buttonvalues})
function updateImage()
{
	// console.log("reloaded random button image")
	// if (isrand.selected){
		newsrc="../buttons/" + buttonvalues[Math.floor(Math.random() * buttonvalues.length)];
		image.src = newsrc;
		image.srcset = newsrc;
	// }
    setTimeout(updateImage, 7000);
}
updateImage()
					</script>
				</div>
				<div class="code-block">
					<div class="code-block-header"><span class="code-lang">HTML</span><button id="buttoncode_copy">Copy</button></div>
					<pre><code contenteditable="true" class="code-content" id="code-content">&lt;a href=&quot;https://fantasydragon.xyz/?src=button&quot;
	target=&quot;_blank&quot;
	rel=&quot;noopener&quot;
	title=&quot;The Dragons Den&quot;
&gt;
	&lt;img style=&quot;width: 88px; height: 31px&quot;
		src=&quot;https://fantasydragon.xyz/buttons/&quot;
		alt=&quot;FantasyDragon14 Button&quot;
	/&gt;
&lt;/a&gt;</code></pre>
				</div>

				<p>If you wanna be nice you can edit the <span>?src</span> part of the href link so I know if someone visits because of you ^w^</p>

				<p>
					If I display your button on <a href="/hub.html">the hub</a> and you want your flyer (the thing pulling your button) changed don't hesitate to contact me <a href="/links.html">(contact methods)</a>.<br />
					(the flyer is 200x100px, the buttons top left corner is at (0, 50)px. Can be any browser-displayable (animated) image format)
				</p>
				<script>
					const copybutton = document.getElementById("buttoncode_copy");
					copybutton.addEventListener("click", function () {
						console.log("copy button pressed");
						// get the content from the code block
						const codeBlock = copybutton.closest(".code-block");
						if (!codeBlock) return;

						const codeElement = codeBlock.querySelector(".code-content");
						if (!codeElement) return;
						// copy to clipboard
						navigator.clipboard
							.writeText(codeElement.textContent)
							.then(() => {
								// Provide feedback
								copybutton.textContent = "Copied!";
								setTimeout(() => {
									copybutton.textContent = "Copy";
								}, 2000);
							})
							.catch((err) => {
								console.error("Failed to copy text:", err);
							});
					});
					function changeCode() {
						val = document.getElementById("buttonselector").value
						newText=document.getElementById("code-content").textContent.replace(/\/buttons\/?[^&"]*/, "/buttons/"+val);
						console.log(newText)
						document.getElementById("code-content").textContent=newText
						console.log("changing code with value "+val)
					}
				</script>
			</section>

			<aside class="schrebergarten">
				<h3>Schrebergarten</h3>
				<p>you ever heard of a <a href="https://webgardens.neocities.org/">Webgarden?</a> here's our collection</p>
				<div class="plots">
					<iframe src="https://fantasydragon.xyz/webgarden" height="250px" width="250px" scrolling="no"></iframe>
					<iframe src="https://vertpush.neocities.org/webgarden" height="270" width="270" scrolling="no"></iframe>
				</div>
			</aside>
		</main>
	</body>
</html>
