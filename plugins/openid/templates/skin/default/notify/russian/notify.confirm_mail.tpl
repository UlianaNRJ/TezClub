Получен запрос авторизации через социальный профиль ({$oKey->getOpenid()|escape:'html'}) на сайте <a href="{cfg name='path.root.web'}">{cfg name='view.name'}</a>.<br>

Для связи вашего аккаунта с социальным профилем ({$oKey->getOpenid()|escape:'html'}) пройдите по ссылке: 
<a href="{router page='login'}openid/confirm/?confirm_key={$oKey->getConfirmMailKey()}">{router page='login'}openid/confirm/?confirm_key={$oKey->getConfirmMailKey()}</a>

<br><br>
С уважением, администрация сайта <a href="{cfg name='path.root.web'}">{cfg name='view.name'}</a>