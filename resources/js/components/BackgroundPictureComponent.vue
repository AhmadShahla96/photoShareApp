<template>
	<div class="container">
		
		<div class="row">
			<div class="card-body">
				<img :src="'/storage/'+bgImage" width="120">
				<form @submit.prevent="updatebgPic" method="post" enctype="multipart/form-data">
					<div class="form-group mt-5">
						<input type="file" name="image" class="form-control" v-on:change="onImageChange">

					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Update </button>

					</div>
					
				</form>

			</div>

		</div>


	</div>
</template>

<script type="text/javascript">
	export default{
		props:['userid'],
		data(){
			return{
				image:'',
				bgImage:''
			}
		},
		mounted(){
			this.getUserRecentBgPic()

		},
		methods:{
			onImageChange(e){
				console.log(e)
				this.image = e.target.files[0];
				
				},
			updatebgPic(){
				const config={
					headers:{
						"content-type":"multipart/form-data"
					}
				}
				let formData = new FormData();
				formData.append('image',this.image);
				axios.post('/bg-pic',formData,config).then((response)=>{
					this.image='',
					this.getUserRecentBgPic()

				}).catch((error)=>{
					alert('unable to update profile picture')
				})
			},
			getUserRecentBgPic(){
				axios.get('/user/bg/'+this.userid).then((response)=>{
					this.bgImage = response.data.substr(7)
				}).catch((error)=>{
					alert('error')
				})


			}
		}
	}
</script>