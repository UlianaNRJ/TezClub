			{hook run='content_end'}
			</div><!-- /content-inner -->
		</div><!-- /content -->

		{if !$noSidebar}
			{include file='sidebar.tpl'}
		{/if}
	</div><!-- /wrapper -->
<div id="footer" style="background-color:#E2EEFC; background-image:url('../../../../templates/skin/street-spirit/images/fon.jpg'); background-repeat:no-repeat; background-position:center center;background-size: 100%;background-origin: content; ">
		<div id="footer-inner">
			<div class="right">
				&copy; <a href="http://teztour.ua/">Tez Tour</a>,  2011-2012<br>// Бюро Социальных Коммуникаций<br>
				<br>
				Контактная информация<br>
				Соглашение о конфиденциальности
				<div class="studio"><!--- {$aLang.text_skin_made_in}<a href="http://stfalcon.com/"><img src="{cfg name='path.static.skin'}/images/studio-logo.png" alt="stfalcon.com"/></a> ----></div>
			</div>

			<div class="left">
				<div class="footer-menu">
					<ul>
						<li>
							{if $oUserCurrent}
							<h3>{$oUserCurrent->getLogin()}</h3>
							<ul>
								<li><a href="{router page='topic'}add/">{$aLang.topic_create}</a></li>
                                {if $oUserCurrent->isAdministrator()}
                                    <li><a href="{cfg name='path.root.web'}/admin">{$aLang.admin_title}</a></li>
                                {/if}
								<li><a href="{router page='talk'}">{$aLang.talk_menu_inbox}</a></li>
								<li><a href="{router page='settings'}profile/">{$aLang.user_settings} {$aLang.user_settings_profile}</a></li>
								<li><a href="{router page='login'}exit/?security_ls_key={$LIVESTREET_SECURITY_KEY}">{$aLang.exit}</a></li>
								<li><br><br><br><br><br><br><br><br></li>
							</ul>
							{else}
							<ul>
								<li><a href="{router page='login'}" class="login_form_show login-link">{$aLang.user_login_submit}</a></li>
								<li><a href="{router page='registration'}">{$aLang.registration_submit}</a></li>
							</ul>
							{/if}

						</li>
						<li>
							{if $aLang.menu_section}<h3>{$aLang.menu_section}</h3>{/if}
							<ul>
								<li><a href="{router page='blogs'}">{$aLang.blogs}</a></li>
								<li><a href="{router page='people'}">{$aLang.people}</a></li>
								<li><a href="{router page='stream'}">{$aLang.profile_activity}</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!-- /container -->{hook run='body_end'}
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27624662-1']);
  _gaq.push(['_setDomainName', 'tezclub.com.ua']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>