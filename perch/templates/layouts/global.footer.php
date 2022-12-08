
<!--
		<aside class="background_dark">
			<div>
				<div class="flow">
				<?php
					perch_blog_custom(array(
						'count'      => 1,
						'template'   => 'post_in_list_card_home.html',
						'sort'       => 'postDateTime',
						'sort-order' => 'DESC',
						'data' => [
							'section' => 'post'
						]
					));
				?>
				</div>
				<div class="flow">
					<h2>Product Development</h2>
					<p>Nature's Laboratory lead the way in the research and development of effective natural health products.</p>
				</div>
				<div class="flow">
					<h2>Innovative Technology</h2>
					<p>Our in-house team develops purpose-built technology, advancing &amp; improving the production of natural medicines.</p>
				</div>
				<div class="flow">
					<p><strong>Follow Us</strong></p>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/company/natures-laboratory/"><i class="fab fa-linkedin fa-2xl"></i></a></li>
					</ul>
				</div>
				<div class="form">
					<form
					  action="https://buttondown.email/api/emails/embed-subscribe/natureslab"
					  method="post"
					  target="popupwindow"
					  onsubmit="window.open('https://buttondown.email/natureslab', 'popupwindow')"
					  class="embeddable-buttondown-form"
					>
					  <label for="bd-email"><strong>Subscribe to our Mailing List</strong></label>
					  <input type="email" name="email" id="bd-email" placeholder="No spam, unsubscribe any time" />
					  <input type="submit" value="Subscribe" />
					</form>
				</div>
			</div>
		</aside>
-->

	</main>
	
	<footer>
		<div>
			<p class="size_400">
				<strong>Three's Company &mdash; <span>Building Healthier Organisations</span></strong><br />
				&copy; Nature's Laboratory Limited <?php echo date('Y'); ?><br />
				Company Reg. 04375564 | <a href="/privacy/">Privacy</a> | <span>+44(0)1947 602346</span>
			</p>
			<ul>
				<li><a href="https://ecologi.com/natureslaboratory?r=61af6aa4f9550a84cf8be3d8" target="_blank" rel="noopener noreferrer" title="View our Ecologi profile"><img alt="We offset our carbon footprint via Ecologi" src="https://api.ecologi.com/badges/cpw/61af6aa4f9550a84cf8be3d8?black=true&landscape=true" /></a></li>
				<li><img src="/assets/images/living-wage.png" alt="Living Wage Employer" /></li>
			</ul>
		</div>
	</footer>
	</body>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script>
		$('header nav button').click(function(){
			$('header nav').toggleClass('show');
		})
	</script>
	</html>