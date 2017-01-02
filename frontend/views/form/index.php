<div class="row">
	<form id="form" class="form-horizontal">
		<div class="form-group">
			<label class="col-xs-3 control-label">Full name</label>
			<div class="col-xs-4">
				<input type="text" class="form-control" name="firstName" placeholder="First name" />
			</div>
			<div class="col-xs-4">
				<input type="text" class="form-control" name="lastName" placeholder="Last name" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label">Username</label>
			<div class="col-xs-5">
				<input type="text" class="form-control" name="username" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label">Email address</label>
			<div class="col-xs-5">
				<input type="text" class="form-control" name="email" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label">Password</label>
			<div class="col-xs-5">
				<input type="password" class="form-control" name="password" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label">Gender</label>
			<div class="col-xs-6">
				<div class="radio">
					<label>
						<input type="radio" name="gender" value="male" /> Male
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="gender" value="female" /> Female
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="gender" value="other" /> Other
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label" id="captchaOperation"></label>
			<div class="col-xs-4">
				<input type="text" class="form-control" name="captcha" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-6 col-xs-offset-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="agree" value="agree" /> Agree with the terms and conditions
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-9 col-xs-offset-3">
				<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
			</div>
		</div>
	</form>
</div>

<?php $this->beginBlock('footer'); ?>
	<h1>footer</h1>
<?php $this->endBlock(); ?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
		  <legend>默认风格的Tab</legend>
		</fieldset>
		 
		<div class="layui-tab">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content">
		    <div class="layui-tab-item layui-show">
		      1. 高度默认自适应，也可以随意固宽。
		      <br>2. Tab进行了响应式处理，所以无需担心数量多少。
		    </div>
		    <div class="layui-tab-item">内容2</div>
		    <div class="layui-tab-item">内容3</div>
		    <div class="layui-tab-item">内容4</div>
		    <div class="layui-tab-item">内容5</div>
		  </div>
		</div>
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>动态操作Tab</legend>
		</fieldset>
		 
		<div class="layui-tab" lay-filter="demo" lay-allowclose="true">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content">
		    <div class="layui-tab-item layui-show">内容1</div>
		    <div class="layui-tab-item">内容2</div>
		    <div class="layui-tab-item">内容3</div>
		    <div class="layui-tab-item">内容4</div>
		    <div class="layui-tab-item">内容5</div>
		  </div>
		</div>
		<div class="site-demo-button">
		  <button class="layui-btn site-demo-active" data-type="tabAdd">新增一个Tab项</button>
		  <button class="layui-btn site-demo-active" data-type="tabDelete">删除第三个Tab项</button>
		  <button class="layui-btn site-demo-active" data-type="tabChange">切换到第二个Tab项</button>
		</div>
		 
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>简洁风格的Tab</legend>
		</fieldset>
		 
		<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content" style="height: 100px;">
		    <div class="layui-tab-item layui-show">内容不一样是要有，因为你可以监听tab事件（阅读下文档就是了）</div>
		    <div class="layui-tab-item">内容2</div>
		    <div class="layui-tab-item">内容3</div>
		    <div class="layui-tab-item">内容4</div>
		    <div class="layui-tab-item">内容5</div>
		  </div>
		</div> 
		 
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>卡片风格的Tab</legend>
		</fieldset>
		 
		<div class="layui-tab layui-tab-card">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content" style="height: 100px;">
		    <div class="layui-tab-item layui-show">默认宽度是相对于父元素100%适应的，你也可以固定宽度。</div>
		    <div class="layui-tab-item">2</div>
		    <div class="layui-tab-item">3</div>
		    <div class="layui-tab-item">4</div>
		    <div class="layui-tab-item">5</div>
		    <div class="layui-tab-item">6</div>
		  </div>
		</div>
		 
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>当Tab数超过一定宽度</legend>
		</fieldset>
		 
		<div class="layui-tab layui-tab-card" style="width: 290px;">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content" style="height: 100px;">
		    <div class="layui-tab-item layui-show">
		      1. 宽度足够，就不会出现右上图标；宽度不够，就会开启展开功能。
		      <br>2. 如果你的宽度是自适应的，Tab会自动判断是否需要展开，并适用于所有风格。
		    </div>
		    <div class="layui-tab-item">2</div>
		    <div class="layui-tab-item">3</div>
		    <div class="layui-tab-item">4</div>
		    <div class="layui-tab-item">5</div>
		    <div class="layui-tab-item">6</div>
		  </div>
		</div>
		 
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>带删除功能的Tab</legend>
		</fieldset>
		 
		<div class="layui-tab layui-tab-card" lay-allowclose="true">
		  <ul class="layui-tab-title">
		    <li class="layui-this">网站设置</li>
		    <li>用户基本管理</li>
		    <li>权限分配</li>
		    <li>商品管理</li>
		    <li>订单管理</li>
		  </ul>
		  <div class="layui-tab-content" style="height: 150px;">
		    <div class="layui-tab-item layui-show">
		      1. 我个人比较喜欢卡片风格的，所以你发现又是以卡片的风格举例
		      2. 删除功能适用于所有风格
		    </div>
		    <div class="layui-tab-item">2</div>
		    <div class="layui-tab-item">3</div>
		    <div class="layui-tab-item">4</div>
		    <div class="layui-tab-item">5</div>
		    <div class="layui-tab-item">6</div>
		  </div>
		</div>          
	</div>
</div>
          
<?php
$js = <<< JS
layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element(); //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  //触发事件
  var active = {
    tabAdd: function(){
      //新增一个Tab项
      element.tabAdd('demo', {
        title: '新选项'+ (Math.random()*1000|0) //用于演示
        ,content: '内容'+ (Math.random()*1000|0)
      })
    }
    ,tabDelete: function(){
      //删除指定Tab项
      element.tabDelete('demo', 2); //删除第3项（注意序号是从0开始计算）
    }
    ,tabChange: function(){
      //切换到指定Tab项
      element.tabChange('demo', 1); //切换到第2项（注意序号是从0开始计算）
    }
  };
  
  $('.site-demo-active').on('click', function(){
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });
});
JS;
$this->registerJs($js);
?>