<template>
	<nav aria-label="Page navigation example">
		<ul class="pagination">
		    <li class="page-item" :class="{'disabled':meta.current_page===1}">
		    	<a class="page-link" href="#" @click.prevent="changePage(meta.current_page-1)">Previous</a>
		    </li>
		    <li class="page-item" :class="{'active':meta.current_page===p}" v-for="p in meta.last_page">
		    	<a class="page-link" href="#" @click.prevent="changePage(p)">{{p}}</a>
		    </li>
		   
		   
		    <li class="page-item"><a class="page-link" href="#" @click.prevent="changePage(meta.current_page+1)"
		    	:class="{'disabled':meta.current_page===meta.last_page}">Next</a></li>
		</ul>
	</nav>
</template>
<script type="text/javascript">
	export default{
		props:['meta'],
		data(){
			return{

			}
		},
		methods:{
			changePage(page){
				if(page<=0||page>this.meta.last_page){
					return
				}

				this.$emit('pagination',page)
			}
		}

		

	}
</script>