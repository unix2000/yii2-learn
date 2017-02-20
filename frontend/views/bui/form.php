<div class="uk-container uk-container-center">
  <div class="uk-grid">
     <div class="uk-width-3-5 uk-container-center">
        <form id="J_Form" class="form-horizontal uk-form" method="post" action="#">
          <h3>入仓信息：</h3>
          <div class="uk-form-row">
            <label class="uk-form-label"><s>*</s>货品来源：</label>
            <div class="uk-form-controls">
              <select data-rules="{required:true}">
                <option value="">-请选择-</option>
                <option value="其他">其他</option>
              </select>
            </div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label"><s>*</s>是否QC：</label>
            <div class="uk-form-controls">
              <input type="radio" name="ismerge" value="是"> 是
              <input type="radio" name="ismerge" value="否" checked="checked" > 否
              <span class="auxiliary-text">默认“预计入仓时间”至少比“活动时间”早2天；如需QC，则“预计入仓时间”至少比“活动时间”早4天</span>
            </div>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label"><s>*</s>活动时间：</label>
            <div class="uk-form-controls">
              <input type="text" class="calendar" data-rules="{required:true}">
            </div>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label"><s>*</s>预计入仓时间：</label>
            <div class="uk-form-controls">
              <input type="text" class="calendar" data-rules="{required:true}">
            </div>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label">上架时间：</label>    
            <div class="uk-form-controls control-row-auto">
              <label class="radio">
                <input type="radio" name="uptime" value="now" checked="checked">立刻
              </label>
              <label  class="radio">
                <input id="chk" type="radio" name="uptime" value="set">设定  
              </label>
              <label class="radio">
                <input type="radio" name="uptime" value="inputc">放入仓库
              </label>
                    
            </div>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label"><s>*</s>入仓类别：</label>
            <div class="uk-form-controls">
              <select data-rules="{required:true}">
                <option value="">-请选择-</option>
                <option value="其他">其他</option>
              </select>
            </div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">4PL处理订单类型：</label>
            <div class="uk-form-controls">
              <label class="checkbox">
                <input type="checkbox" value="零售">零售
              </label>
              <label class="checkbox">
                <input type="checkbox" value="聚划算" checked="checked">聚划算
              </label>
            </div>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label">仓原备注：</label>
            <div class="uk-form-controls control-row4">
              <textarea type="text" class="input-large" data-valid="{}"></textarea>
            </div>
          </div>
          <hr>
          <div class="uk-form-row">
            <button id="btnSearch" type="submit" class="uk-button uk-button-primary">提交</button>
          </div>
        </form> 
      </div>
  </div>
</div>
<?php 
$js = <<< JS
   BUI.use('bui/form',function(Form) {
    new Form.Form({
      srcNode : '#J_Form'
    }).render();
  });
JS;
$this->registerJs($js);
?>