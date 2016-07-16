<?php 
use kartik\dialog\Dialog;

// widget with default options
echo Dialog::widget();

// buttons for testing the krajee dialog boxes
$btns = <<< HTML
<button type="button" id="btn-alert" class="btn btn-info">Alert</button>
<button type="button" id="btn-confirm" class="btn btn-warning">Confirm</button>
<button type="button" id="btn-prompt" class="btn btn-primary">Prompt</button>
<button type="button" id="btn-dialog" class="btn btn-default">Dialog</button>
HTML;
echo $btns;

// javascript for triggering the dialogs
$js = <<< JS
$("#btn-alert").on("click", function() {
    krajeeDialog.alert("This is a Krajee Dialog Alert!")
});
$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("Are you sure you want to proceed?", function (result) {
        if (result) {
            alert('Great! You accepted!');
        } else {
            alert('Oops! You declined!');
        }
    });
});
$("#btn-prompt").on("click", function() {
    krajeeDialog.prompt({label:'Provide reason', placeholder:'Upto 30 characters...'}, function (result) {
        if (result) {
            alert('Great! You provided a reason: ' + result);
        } else {
            alert('Oops! You declined to provide a reason!');
        }
    });
});
$("#btn-dialog").on("click", function() {
    krajeeDialog.dialog(
        'This is a <b>custom dialog</b>. The dialog box is <em>draggable</em> by default and <em>closable</em> ' +
        '(try it). Note that the Ok and Cancel buttons will do nothing here until you write the relevant JS code ' +
        'for the buttons within "options". Exit the dialog by clicking the cross icon on the top right.',
        function (result) {alert(result);}
    );
});
JS;

// register your javascript
$this->registerJs($js);
?>