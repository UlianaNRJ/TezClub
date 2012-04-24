{assign var="noSidebar" value=true}
{include file='header.tpl'}
{literal}
<script>
//window.onload = country_list_action;
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", country_list_action, false);
}
</script>
{/literal}

<div class="center-block">
	<h2>{$aLang.settings_menu}</h2>
	{include file='menu.settings.tpl'}


	<div class="settings-wrapper">
		<form action="" method="POST" enctype="multipart/form-data">

			{hook run='form_settings_profile_begin'}

			<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />

					
			<dl class="form-item">
				<dd><label for="profile_name">{$aLang.settings_profile_name}:</label></dd>
				<dt><input type="text" name="profile_name" id="profile_name" value="{$oUserCurrent->getProfileName()|escape:'html'}" class="input-200" /></dt>
			</dl>	
			
			<dl class="form-item">
				<dd><label for="profile_sex">{$aLang.settings_profile_sex}:</label></dd>
				<dt>
					<select name="profile_sex">
						<option value="man" {if $oUserCurrent->getProfileSex()=='man'}selected{/if}>{$aLang.settings_profile_sex_man}</option>
						<option value="woman" {if $oUserCurrent->getProfileSex()=='woman'}selected{/if}>{$aLang.settings_profile_sex_woman}</option>
						<option value="other" {if $oUserCurrent->getProfileSex()=='other'}selected{/if}>{$aLang.settings_profile_sex_other}</option>
					</select>
				</dt>
			</dl>
			
			<dl class="form-item">
				<dd><label for="">{$aLang.settings_profile_birthday}:</label></dd>
				<dt>
					<select name="profile_birthday_day">
						<option value="">{$aLang.date_day}</option>
						{section name=date_day start=1 loop=32 step=1}
							<option value="{$smarty.section.date_day.index}" {if $smarty.section.date_day.index==$oUserCurrent->getProfileBirthday()|date_format:"%d"}selected{/if}>{$smarty.section.date_day.index}</option>
						{/section}
					</select>
					<select name="profile_birthday_month">
						<option value="">{$aLang.date_month}</option>
						{section name=date_month start=1 loop=13 step=1}
							<option value="{$smarty.section.date_month.index}" {if $smarty.section.date_month.index==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.month_array[$smarty.section.date_month.index][0]}</option>
						{/section}
					</select>
					<select name="profile_birthday_year">
						<option value="">{$aLang.date_year}</option>
						{section name=date_year start=1940 loop=2000 step=1}
							<option value="{$smarty.section.date_year.index}" {if $smarty.section.date_year.index==$oUserCurrent->getProfileBirthday()|date_format:"%Y"}selected{/if}>{$smarty.section.date_year.index}</option>
						{/section}
					</select>
				</dt>
			</dl>
			
			{*<dl class="form-item">
				<dd><label for="profile_country">{$aLang.settings_profile_country}:</label></dd>
				<dt><input type="text" id="profile_country" name="profile_country" value="{$oUserCurrent->getProfileCountry()|escape:'html'}" class="input-200 autocomplete-country" /></dt>
			</dl>	
			
			<dl class="form-item">
				<dd><label for="profile_city">{$aLang.settings_profile_city}:</label></dd>
				<dt><input type="text" id="profile_city" name="profile_city" value="{$oUserCurrent->getProfileCity()|escape:'html'}" class="input-200 autocomplete-city" /></dt>
			</dl>*}

           <dl class="form-item">
                <dd><label for="profile_country">{$aLang.settings_profile_country}:</label></dd>
                <dt><select id="country_list" onChange="country_list_action()" name="profile_country" class="w300">
                    <option value="">- {$aLang.settings_profile_country_not_selected} -</option>
                    {foreach from=$aCountryList key=k item=v}
                    <option value="{$v.name}" id="cid{$v.id}" {if $v.name==$oUserCurrent->getProfileCountry()}selected{/if}>{$v.name}</option>
                    {/foreach}
                    <option value="_full_list_">- {$aLang.settings_profile_full_list} -</option>
                </select>
                <img src="{$aTemplateWebPathPlugin.extcity}images/ajax.gif" id="countryAjax" style="float: left; position: relative; top: 7px; display: none" /><br />
                </dt>
            </dl>

            <dl class="form-item">
                <span id="city_list_div" style="display:none;">
                    <dd><label for="profile_city">{$aLang.settings_profile_city}:</label></dd>
                    <dt><select id="city_list" onChange="city_list_action()" name="profile_city" class="w300">
                         <option value="">- {$aLang.settings_profile_city_not_selected} -</option>
                    </select>
                    <input type="text" class="input-200" id="city_list_input" style="display:none" /></dt>
                </span>
            </dl>
			
			<dl class="form-item">
				<dd><label for="profile_about">{$aLang.settings_profile_about}:</label></dd>
				<dt><textarea class="input-300" name="profile_about" id="profile_about">{$oUserCurrent->getProfileAbout()|escape:'html'}</textarea></dt>
			</dl>

			{hook run='form_settings_profile_end'}
			
			<div class="form-sep"></div>
			
			<input type="submit" class="submit" value="{$aLang.settings_profile_submit}" name="submit_profile_edit" />
		</form>
	</div>
</div>

{include file='footer.tpl'}