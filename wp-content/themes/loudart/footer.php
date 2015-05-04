						<?php
							$uploads = wp_upload_dir();
						?>		
				
						<div class="contact-holder">
							<h2 class="header-footer"><span class="outer"><span class="inner">Contact</span></span></h2>
							<div class="web-contact info">
								<p class="contact-info"><a href="mailto:jim@louden.io">jim@louden.io</a></p>
								<p class="contact-info">559.999.1791</p>
							</div>
							<div class="web-contact resume">
								<a class="no-smoothstate resume-circle" target="_blank" href="<?php echo esc_url( $uploads['baseurl'] ); ?>/2015/02/jim-louden_frontend-developer_resume.pdf">
								<?php echo file_get_contents(get_template_directory_uri().'/_inc/imgs/icon-resume.svg'); ?>
								<span class="resume-text">Resume</span>
								</a>
							</div>
						</div><!-- holder -->
					</section><!-- #contact -->
				<footer>
					<?php footer_nav(); ?>
				</footer>
			</div><!-- site-container -->
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			  ga('create', 'UA-60456719-1', 'auto');
			  ga('send', 'pageview');
			</script>
		</div><!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
