<h1>vue route library</h1>
<h1>Hello App!</h1>
<p>
<!-- 使用 router-link 组件来导航. -->
<!-- 通过传入 `to` 属性指定链接. -->
<!-- <router-link> 默认会被渲染成一个 `<a>` 标签 -->
<router-link to="/home">首页</router-link>
<router-link to="/about">关于我们</router-link>
</p>
<!-- 路由出口 -->
<!-- 路由匹配到的组件将渲染在这里 -->
<router-view></router-view>

<?php
$js = <<<JS
	//const es6
	var Home = { template: '<div>首页模板</div>' }
	var About = { template: '<div>关于我们模板</div>' }

	// 2. 定义路由
	// 每个路由应该映射一个组件。 其中"component" 可以是
	// 通过 Vue.extend() 创建的组件构造器，
	// 或者，只是一个组件配置对象。
	// 我们晚点再讨论嵌套路由。
	var routes = [
	  { path: '/home', component: Home },
	  { path: '/about', component: About }
	]

	// 3. 创建 router 实例，然后传 `routes` 配置
	// 你还可以传别的配置参数, 不过先这么简单着吧。
	var router = new VueRouter({
	  routes // （缩写）相当于 routes: routes
	})

	// 4. 创建和挂载根实例。
	// 记得要通过 router 配置参数注入路由，
	// 从而让整个应用都有路由功能
	var app = new Vue({
	  el : '#app',
	  router
	});
JS;
$this->registerJs($js);