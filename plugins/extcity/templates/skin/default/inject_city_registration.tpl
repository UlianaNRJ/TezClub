{literal}
<script>
window.onload = country_list_action;
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", country_list_action, false);
}
</script>
{/literal}
<p>
    <label for="profile_country">{$aLang.settings_profile_country}:</label><br />
    <select id="country_list" onChange="country_list_action()" name="profile_country" class="w300">
        <option value="">- {$aLang.settings_profile_country_not_selected} -</option>
        {foreach from=$aCountryList key=k item=v}
        <option value="{$v.name}" id="cid{$v.id}" {if $v.name==$_aRequest.profile_country}selected{/if}>{$v.name}</option>
        {/foreach}
        <option value="_full_list_">- {$aLang.settings_profile_full_list} -</option>
    </select>
    <img src="{$aTemplateWebPathPlugin.extcity}images/ajax.gif" id="countryAjax" style="float: left; position: relative; top: 7px; display: none" /><br />

    <span id="city_list_div" style="display:none;">
        <label for="profile_city">{$aLang.settings_profile_city}:</label><br />
        <select id="city_list" onChange="city_list_action()" name="profile_city" class="w300">
             <option value="">- {$aLang.settings_profile_city_not_selected} -</option>
        </select>
        <input type="text" class="w300" id="city_list_input" style="display:none" />
        <br />
    </span>
</p>