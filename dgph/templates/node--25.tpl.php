<!-- Request New Data -->
<?php
    global $user;
    $account = user_load($user->uid);
    $curForm = isset($_SESSION['request_new_data_form']) ? $_SESSION['request_new_data_form'] : null;
    if ($curForm!=null) {
        $requestedByName = $curForm['field_requested_by_name'];
        $requestedByEmail = $curForm['field_requested_by_email'];
        $title = $curForm['field_title'];
        $dataHolder = $curForm['field_data_holder'];
        $dataDescription = $curForm['field_data_description'];
        $detailsOfSuggestedUse = $curForm['field_details_of_expected_use'];
        $organization = $curForm['field_organization'];
        $publicationPreference = $curForm['field_publication_preference'];
        $suggestedUse = $curForm['field_suggested_use'];
        $status = $curForm['field_status'];
    }
    else {
        $firstName = $account->field_first_name['und'][0]['value'];
        $lastName = $account->field_last_name['und'][0]['value'];
        $requestedByEmail = $account->mail;
        $requestedByName = "$firstName $lastName";
        $title = '';
        $dataHolder = '';
        $dataDescription = '';
        $detailsOfSuggestedUse = '';
        $organization = 1;
        $publicationPreference = 1;
        $suggestedUse = 1;
        $status = 1;
    }
   
?>

<form id='request-new-data' class='custom' accept-charset="UTF-8" method="post" action="/request-new-data/submit">
<div class="row news-con">
    <div class="six columns subpage-title">
        <h1>Request new data</h1>
    </div>
    <div class="clear"></div>
        <div class="three columns datarequest">
            <div class="picturup">
        	<h1>Requested by</h1>
                <div class="requested-by-info">
                    <label>Your Name (*)</label>
                    <input name="field_requested_by_name" type="text" value="<?php echo $requestedByName ?>">
                    <label>Email (*)</label> 
                    <input name="field_requested_by_email" type="text" value="<?php echo $requestedByEmail ?>">
                </div>
            </div>
        </div>
        <div class="six columns  subpage-datarequest datarequest">
            <h1>Data Request</h1>
            <div class="request">
                <label>Title of requested data (*)</label>
                <input name="field_title" type="text" value="<?php echo $title ?>">
                <div class="clear"></div>
                <label>Data Holder</label>
                <input name="field_data_holder" type="text" value="<?php echo $dataHolder ?>">
                <div class="clear"></div>
                <label>Data Description</label>
                <textarea name="field_data_description" rows="15"><?php echo $dataDescription ?></textarea>
                <div class="clear"></div>
                <label>Details of suggested use</label>
                <textarea name="field_details_of_expected_use" rows="10"><?php echo $detailsOfSuggestedUse ?></textarea>
                <div class="clear"></div>
            </div>
            <input name="Submit" type="submit" value="Submit" class="btn">
        </div>
        <div class="three columns rightside datarequest_right">
            <div id="accordion" class='sidebar-accordion'>
                <h3>Organization Type</h3>
                <div>
                    <p>
                        <label for='organization_1'><input id='organization_1' type="radio" name='field_organization' value='1'<?php echo (1==$organization) ? "checked='checked'" : '' ?> style="display: none;"> Private Individual </label> 
                        <label><input type="radio" name="field_organization' value='2'<?php echo (2==$organization) ? "checked='checked'" : '' ?> style="display: none;"> Start up  </label> 
                        <label><input type="radio" name='field_organization' value='3'<?php echo (3==$organization) ? "checked='checked'" : '' ?> style="display: none;"> Small to Medium Business </label> 
                        <label><input type="radio" name='field_organization' value='4'<?php echo (4==$organization) ? "checked='checked'" : '' ?> style="display: none;"> Large Company (Over 250 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;employees)  </label> 
                        <label><input type="radio" name='field_organization' value='5'<?php echo (5==$organization) ? "checked='checked'" : '' ?> style="display: none;"> Voluntary sector or not-for-
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;profit organisation</label> 
                        <label><input type="radio" name='field_organization' value='6' style="display: none;"> Public Sector Organisation
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic or Research</label> 
                    </p>
                </div>
                <h3>Publication preference </h3>
            <div>
                <p>
                    <label><input type="radio" name='field_publication_preference' value='1'<?php echo (1==$publicationPreference) ? "checked='checked'" : '' ?> style="display: none;"> Public request </label> 
                    <label><input type="radio" name='field_publication_preference' value='2'<?php echo (2==$publicationPreference) ? "checked='checked'" : '' ?> style="display: none;"> Confidential request </label> 
                </p>
            </div>
            <h3>Suggested use </h3>
            <div>
                <p>
                    <label><input type="radio" name='field_suggested_use' value='1'<?php echo (1==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Business </label> 
                    <label><input type="radio" name='field_suggested_use' value='2'<?php echo (2==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Climate Change  </label> 
                    <label><input type="radio" name='field_suggested_use' value='3'<?php echo (3==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Personal </label> 
                    <label><input type="radio" name='field_suggested_use' value='4'<?php echo (4==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Research </label> 
                    <label><input type="radio" name='field_suggested_use' value='5'<?php echo (5==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Environment</label> 
                    <label><input type="radio" name='field_suggested_use' value='6'<?php echo (6==$suggestedUse) ? "checked='checked'" : '' ?> style="display: none;"> Other</label> 
                </p>
            </div>
            <h3>Status</h3>
            <div>
                <p>
                    <select class="form-select required" name="field_status" disabled="disabled">
                        <option<?php echo (1==$status) ? "selected" : '' ?> value="1">Open</option>
                        <option<?php echo (2==$status) ? "selected" : '' ?> value="2">Processing Request</option>
                        <option<?php echo (3==$status) ? "selected" : '' ?> value="3">Dataset Scheduled for Release</option>
                        <option<?php echo (4==$status) ? "selected" : '' ?> value="4">Dataset Released</option>
                        <option<?php echo (5==$status) ? "selected" : '' ?> value="5">Not a Data Issue</option>
                    </select>
                </p>
            </div>     
        </div>
    </div>
</div>
</form>