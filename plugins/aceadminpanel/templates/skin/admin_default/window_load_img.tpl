<div style="display: none;">
    <div class="login-popup upload-image" id="window_load_img">
        <div class="login-popup-top"><a href="#" class="close-block" onclick="return false;"></a></div>
        <div class="content">
            <form method="POST" action="" enctype="multipart/form-data" id="form_upload_img">
                <h3>{$aLang.uploadimg}</h3>

                <p><label for="window_load_img_file">{$aLang.uploadimg_file}:</label><br/>
                    <input type="file" id="window_load_img_file" name="img_file" value="" class="w100p"/></p>

                <p><label for="window_load_img_url">{$aLang.uploadimg_url}:</label><br/>
                    <input type="text" id="window_load_img_url" name="img_url" value="http://" class="w100p"/></p>

                <p><label for="window_load_img_align">{$aLang.uploadimg_align}:</label><br/>
                    <select id="window_load_img_align" name="align" class="w100p">
                        <option value="">{$aLang.uploadimg_align_no}</option>
                        <option value="left">{$aLang.uploadimg_align_left}</option>
                        <option value="right">{$aLang.uploadimg_align_right}</option>
                    </select>
                </p>
                <p style="margin-bottom: 20px;"><label for="window_load_img_title">{$aLang.uploadimg_title}:</label><br/>
                    <input type="text" class="w100p" id="window_load_img_title" name="title" value=""/></p>
                <input type="button" value="{$aLang.uploadimg_submit}"
                       onclick="ajaxUploadImg(document.getElementById('form_upload_img'),'{$sToLoad}');">
                <input type="button" value="{$aLang.uploadimg_cancel}" onclick="hideImgUploadForm(); return false;">
            </form>
        </div>
        <div class="login-popup-bottom"></div>
    </div>
</div>