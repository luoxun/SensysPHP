<div class="ui fullscrean modal"><!-- MODAL UPLOAD DATA TRAINING -->
  <i class="close icon"></i>
  <div class="header">
    Upload Data Training
  </div>
  <div class="content">
    {{ Form::open(array('action'=>'AdminController@upload_data_training','class'=>'dropzone','files'=>true)) }}
    {{ Form::close() }}
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<!-- /////////////////////////////////////////////////// -->