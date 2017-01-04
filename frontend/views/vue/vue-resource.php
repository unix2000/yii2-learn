<h1>vue http vue-resource library</h1>
<button class="btn uk-button-primary" @click="fetchdata">获取数据</button>
<div class="uk-grid">
	<div class="uk-width-1-3">
		<h1>豆瓣电影排行榜</h1>
		{{count}}
		{{message}}
		<div v-for="article in datas" class="uk-article">
        	{{article.title}}
        	<img :src="article.images.small" />
      	</div>
	</div>
</div>
<?php
$js = <<< JS
	var vm = new Vue({
		el: '#app',
		data : {
			datas: [],
			count: 0,
			message: 'message'
		},
		mounted: function() {
			// console.log(Vue.http); //Vue.http可全局使用
			var vm = this
			Vue.http.jsonp('https://api.douban.com/v2/movie/top250?count=10', {}, {
		        headers: {

		        },
		        emulateJSON: true
		    }).then(function(response) {
		    	console.log(response.data.subjects);
		    	vm.message = 'hello';
		    	// alert(response.data.count);
		        vm.datas = response.data.subjects;
		    }, function(response) {
		        // 这里是处理错误的回调
		        console.log(response);
		    });
		},
		methods: {
			fetchdata: function(){
				var vm = this //必须加入这个定义,可解决局部变量问题
				// console.log(Vue.http); //Vue.http可全局使用
				Vue.http.jsonp('https://api.douban.com/v2/movie/top250?count=10', {}, {
			        headers: {

			        },
			        emulateJSON: true
			    }).then(function(response) {
			      	// 这里是处理正确的回调
			    	// console.log(response.data.subjects);
			    	vm.message = '中文---';
			    	// alert(response.data.count);
			    	vm.count = response.data.count;
			        vm.datas = response.data.subjects;
			    }, function(response) {
			        // 这里是处理错误的回调
			        console.log(response)
			    });
			}
		}
	});
JS;
$this->registerJs($js);

?>