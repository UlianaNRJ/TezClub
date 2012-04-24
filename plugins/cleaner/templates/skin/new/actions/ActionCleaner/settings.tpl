{include file='header.tpl' menu='settings' showWhiteBack=true}
	{literal}
	<script language="JavaScript" type="text/javascript">
	function Cleaner() {
		new Request.JSON({
			url: aRouter['settings']+'cleaner/clean/',
			noCache: true,
			data: { security_ls_key: LIVESTREET_SECURITY_KEY },
			onSuccess: function(result){
				if (!result) {
                	msgErrorBox.alert('Error','Please try again later');
        		}
        		if (result.bStateError) {
                	msgErrorBox.alert(result.sMsgTitle,result.sMsg);
        		} else {
        			msgNoticeBox.alert(result.sMsgTitle,result.sMsg);
        		}

			},
			onFailure: function(){
				msgErrorBox.alert('Error','Please try again later');
			}
		}).send();
	}
	</script>
	{/literal}
<input type="button" value="{$aLang.cleaner_button}" onclick="Cleaner();">


{include file='footer.tpl'}
