<h1>vue http vue-resource library</h1>
<button class="btn uk-button-primary" @click="fetchdata">获取api.dev用户</button>
<div class="uk-grid">
	<div class="uk-width-1-3">
		<h1>===用户列表===</h1>
		{{message}}
		<div v-for="user in datas" class="uk-article">
        	{{user.id}} => {{user.username}} => {{user.full_name}}
      	</div>
	</div>
</div>
<?php
$js = <<< JS
	var vm = new Vue({
		el: '#app',
		data : {
			datas: [],
			message: 'message'
		},
		mounted: function() {
			// console.log(Vue.http); //Vue.http可全局使用
			var vm = this
			Vue.http.get('http://api.dev/users', {}, {
		        headers: {

		        },
		        emulateJSON: true
		    }).then(function(response) {
		    	console.log(response.data);
		    	vm.message = 'hello';
		    	// alert(response.data.success);
		        vm.datas = response.data.data.users;
		    }, function(response) {
		        // 这里是处理错误的回调
		        //vm.message = response.data.statusText;
		        // console.log(response);
		    });
		},
		methods: {
			fetchdata: function(){
				var vm = this //必须加入这个定义,可解决局部变量问题
				// console.log(Vue.http); //Vue.http可全局使用
				Vue.http.get('http://api.dev/users', {}, {
			        headers: {

			        },
			        emulateJSON: true
			    }).then(function(response) {
			      	// 这里是处理正确的回调
			    	// console.log(response.data.data.users);
			    	vm.message = '获取成功！！！';
			        vm.datas = response.data.data.users;
			    }, function(response) {
			        // 这里是处理错误的回调
			        //vm.message = response.data.statusText;
			        console.log(response)                    
			    });
			}
		}
	});
JS;
$this->registerJs($js);

?>