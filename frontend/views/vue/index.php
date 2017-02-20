<h1>vue</h1>

<!-- component template -->
<script type="text/x-template" id="side-tests">
	<div>
		<h1>side-tests组件模板,判断请用render</h1>
	</div>
</script>

<side-tests :level="1"></side-tests>
<side-menu></side-menu>
<side-left></side-left>
<side-right></side-right>
<div class="row">
	<div class="col-md-3 col-md-offset-2">
		{{ message | cap }}
		{{ fullname }}
		<input type="text" v-model="message" class="form-control">
		<input type="text" v-model="firstname" class="form-control">
		<input type="text" v-model="lastname" class="form-control">
		<input type="button" class="btn btn-primary" @click="doOne" value="doOne">
		<input type="button" class="btn btn-primary" value="v-bind class" 
	    	v-bind:class="{ active: isActive, 'btn-lg btn-danger disabled': hasOne }">
	    <button class="btn btn-primary" v-on:click="say('hi')">Say hi</button>
			<button class="btn btn-primary" v-on:click="say('what')">Say what</button>
			<button class="btn btn-primary" v-on:click="warn('表单暂时不能提交！', $event)">提交</button>
			<input type="button" v-on:keyup.enter="submit" class="btn btn-primary" value="submit1">
		<input type="button" @keyup.enter="submit" class="btn btn-primary" value="submit2">
		<!-- 单字符貌似无效 -->
		<!-- <input type="button" class="btn btn-primary" v-on:keyup.v="say('That is the first letter in Vue')" value="v快捷键"> -->
		<img src="/002.jpg" class="img-responsive img-circle">
	</div>
	<div class="col-md-7">
	<ul>  
		<todo-item v-for="t1 in todos" v-bind:t2="t1"></todo-item>
		<input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
		<label for="jack">Jack</label>
		<input type="checkbox" id="john" value="John" v-model="checkedNames">
		<label for="john">John</label>
		<input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
		<label for="mike">Mike</label>
		<span>Checked names: {{ checkedNames }}</span>

		<input type="radio" id="one" value="One" v-model="picked">
		<label for="one">One</label>
		<br>
		<input type="radio" id="two" value="Two" v-model="picked">
		<label for="two">Two</label>
		<span>Picked: {{ picked }}</span>

		<my-component></my-component>
	</ul>
	</div>
</div>

<?php
$js = <<< JS
//组件template使用方法
Vue.component('side-tests',{
	template: '#side-tests',
	// render: function (createElement) {
	//     return createElement(
	//       'h' + this.level,   // tag name 标签名称
	//       '' // 子组件中的阵列
	//     )
 //  	},
	props: {
	    level: {
	      type: Number,
	      required: true
	    }
	}
})

Vue.component('side-menu', {
	template: '<div>菜单组件!</div>'
})
Vue.component('side-left', {
	template: '<div>左边组件!</div>'
})
Vue.component('side-right', {
	template: '<div>右边组件!</div>'
})
Vue.component('my-component', {
	template: '<div>一个自定义组件!</div>'
})
Vue.component('todo-item', {
	props: ['t2'],
	template: '<li>{{ t2.text }}</li>'
})

var vm = new Vue({
	el : '#app',
	data : {
		message : 'liner.xie',
		// fullname: '', //vue2.0.1版本必须定义,2.1.8版本后不需要这么定义
		firstname : '',
		lastname : '',
		checkedNames: [],
		picked : '',
		isActive: true,
			hasOne: true,
		todos: [
	      { text: '===中文Learn JavaScript===' },
	      { text: '===中文Learn Vue===' },
	      { text: '===中文Build something awesome===' }
	    ]
	},
	filters: {
		cap : function(val){
			if (!val) return ''
				value = val.toString()
				return value.charAt(0).toUpperCase() + value.slice(1)
		}
	},
	// watch : {
	// 	firstname : function(val) {
	// 		this.fullname = val + ' ' + this.lastname
	// 	},
	// 	lastname : function(val){
	// 		this.fullname = val + ' ' + this.firstname 
	// 	}
	// },

	computed: {
		fullname : function(){
			return this.firstname + ' ' + this.lastname
		}
	},

	// computed : {
	// 	fullname : {
	// 		get : function(){
	// 			return this.firstname + ' ' + this.lastname
	// 		},
	// 		set : function(newValue){
	// 			var names = newValue.split(' ')
 //   					this.firstname = names[0]
 //   					this.lastname = names[names.length - 1]
	// 		}
	// 	}
	// },
	methods : {
		doOne: function(event){
			alert('doOne click')
			alert(event.target.tagName)
		},
		say : function(a){
			alert(a)
		},
		warn: function (message, event) {
			// now we have access to the native event
			if (event) event.preventDefault()
		    alert(message)
		}
	}
});		
JS;
$this->registerJs($js);
